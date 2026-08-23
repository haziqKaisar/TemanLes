<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Tutor;

class LandingController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            return redirect()->route('marketplace');
        }

        $tutorCount = Tutor::verified()->count();
        $subjects = Subject::orderBy('name')->take(10)->get();

        return view('landing', compact('tutorCount', 'subjects'));
    }
}
