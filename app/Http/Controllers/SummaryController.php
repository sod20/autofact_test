<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Quiz;

class SummaryController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        if (! $user->can('summary')) {
            return redirect('/quizzes');
        }
        $quizzes = Quiz::all();
        $page_reliability = $quizzes->countBy('page_reliability');
        return view('summary.index', compact('page_reliability'));
    }
}
