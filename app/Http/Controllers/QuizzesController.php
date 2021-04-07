<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use Log;

class QuizzesController extends Controller
{
    public function index(Request $request)
    {
        $user = \Auth::user();
        Log::info("User '$user->name' accessed to Quiz index");
        $quizzes = Quiz::where('user_id', $user->id)->get();
        if(count($quizzes) == 0) {
            return view('quiz.index');
        }
        foreach($quizzes as $quiz) {
            if (date('M-Y', strtotime($quiz->created_at)) == date('M-Y')) {
                Log::info("User '$user->name' already has response quiz this month");
                return view('quiz.detail', compact('quiz'));
            }
        }
        Log::info("User '$user->name' needs to respond monthly quiz");
        return view('quiz.index');
    }

    public function store(Request $request)
    {
        try {
            $user = \Auth::user();
            $quiz = new Quiz();
            $quiz->user_id = $user->id;
            $quiz->note = $request->note;
            $quiz->page_load_speed = $request->page_load_speed;
            $quiz->page_reliability = $request->page_reliability;
            $quiz->save();
            Log::info("User '$user->name' response was successfully stored.");
            Log::info("Response Data: " . json_encode($quiz));
            return view('quiz.detail', compact('quiz'));
        } catch(\Exception $e) {
            Log::error("User '$user->name' response produce an error while trying to store it.");
            Log::error("Error: " . $e->getMessage());
        }
        return view('error.not_found');
    }
}
