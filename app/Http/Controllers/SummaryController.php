<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Log;
use App\Models\Quiz;

class SummaryController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        if (! $user->can('summary')) {
            Log::warning("User '$user->name' try to access to summary.index page");
            return redirect('/quizzes');
        }
        Log::info("Admin '$user->name' accessed to sumary page");
        $quizzes = Quiz::all();
        $page_reliability = $quizzes->countBy('page_reliability');
        return view('summary.index', compact('page_reliability'));
    }
}
