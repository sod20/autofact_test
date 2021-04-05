<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;

class QuizzesController extends Controller
{
    public function index(Request $request)
    {
        $user = \Auth::user();
        $quizzes = Quiz::where('user_id', $user->id)->get();
        if(count($quizzes) == 0) {
            return view('quiz.index');
        }
        foreach($quizzes as $quiz) {
            if (date('M-Y', strtotime($quiz->created_at)) == date('M-Y')) {
                return view('quiz.detail', compact('quiz'));
            }
        }
        return view('quiz.index');
    }

    public function store(Request $request)
    {
        $user = \Auth::user();
        $quiz = new Quiz();
        $quiz->user_id = $user->id;
        $quiz->note = $request->note;
        $quiz->page_load_speed = $request->page_load_speed;
        $quiz->page_reliability = $request->page_reliability;
        $quiz->save();
        return view('quiz.detail', compact('quiz'));
    }
}
