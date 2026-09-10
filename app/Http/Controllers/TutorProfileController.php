<?php

namespace App\Http\Controllers;

use App\Models\Tutor;

class TutorProfileController extends Controller
{
    public function show(Tutor $tutor)
    {
        abort_unless($tutor->verification_status === 'verified', 404);

        $tutor->load([
            'tutorSubjects' => fn ($q) => $q->where('is_active', true)->with('subject'),
            'availabilities' => fn ($q) => $q->where('is_active', true)->orderBy('day_of_week')->orderBy('start_time'),
            'reviews' => fn ($q) => $q->whereNotNull('comment')->orWhere('rating', '>', 0),
            'reviews.student',
        ]);

        $tutor->setRelation(
            'reviews',
            $tutor->reviews()->with('student')->latest()->take(10)->get()
        );

        return view('tutors.show', compact('tutor'));
    }
}
