<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;
use App\Models\Quiz;
use App\Models\User;

class ApiController extends Controller
{
    public function store(Request $request)
    {
        Log::info("Looking API user: " . $request->header('api_token'));
        $user = User::where('api_token', $request->header('api_token'))->first();
        if (! $user) {
            return response()->json([
                'result' => 'error',
                'message' => 'unauthorized'
            ], 401);
        }
        Log::info("API User '$user->name' trying to create respond quiz");
        $quizzes = Quiz::where('user_id', $user->id)->get();
        foreach($quizzes as $quiz) {
            if (date('M-Y', strtotime($quiz->created_at)) == date('M-Y')) {
                Log::info("User '$user->name' already had response quiz this month");
                return response()->json([
                    'result' => 'error',
                    'message' => 'user already had response quiz this month',
                ], 200);
            }
        }
        $quiz = new Quiz();
        $quiz->user_id = $user->id;
        $quiz->note = $request->note;
        $quiz->page_load_speed = $request->page_load_speed;
        $quiz->page_reliability = $request->page_reliability;
        $quiz->save();
        Log::info("API User '$user->name' response was successfully stored.");
        Log::info("Response Data: " . json_encode($quiz));
        return response()->json([
            'result' => 'success',
            'message' => 'quiz info stored successfully'
        ], 200);
    }

    public function getLast(Request $request)
    {
        Log::info("Looking for API user for " . $request->header('api_token'));
        $user = User::where('api_token', $request->header('api_token'))->first();
        if (! $user) {
            Log::warning("User does not exist");
            return response()->json([
                'result' => 'error',
                'message' => 'unauthorized'
            ], 401);
        }
        Log::info("API User '$user->name' trying to create respond quiz");
        $lastQuiz = Quiz::where('user_id', $user->id)->orderBy('id', 'DESC')->first();
        if (! $lastQuiz) {
            return response()->json([[
                'result' => 'error',
                'message' => 'user does not have a quiz'
            ], 204]);
        }
        return response()->json([
            'result' => 'success',
            'message' => 'user last quiz data',
            'data' => $lastQuiz
        ], 200);
    }

    public function getAll(Request $request)
    {
        Log::info("Looking for API user for " . $request->header('api_token'));
        $user = User::where('api_token', $request->header('api_token'))->first();
        if (! $user) {
            Log::warning("User does not exist");
            return response()->json([
                'result' => 'error',
                'message' => 'unauthorized'
            ], 401);
        }
        if ($user->role != "admin") {
            Log::warning("User is not admin");
            return response()->json([
                'result' => 'error',
                'message' => 'unauthorized'
            ], 401);
        }
        Log::info("Sending Quiz data to user $user->name");
        $quizzes = Quiz::all();
        return response()->json([
            'result' => 'success',
            'message' => 'all quizzes',
            'data' => $quizzes
        ], 200);
    }
}
