<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Tutor;
use Illuminate\Http\Request;

class TutorMarketplaceController extends Controller
{
    public function index(Request $request)
    {
        $tutors = Tutor::verified()
            ->with(['user', 'tutorSubjects.subject'])
            ->when($request->subject_id || $request->level || $request->min_price || $request->max_price, function ($q) use ($request) {
                $q->whereHas('tutorSubjects', function ($q) use ($request) {
                    $q->when($request->subject_id, fn ($q) => $q->where('subject_id', $request->subject_id))
                        ->when($request->level, fn ($q) => $q->where('level', $request->level))
                        ->when($request->min_price, fn ($q) => $q->where('price_per_hour', '>=', $request->min_price))
                        ->when($request->max_price, fn ($q) => $q->where('price_per_hour', '<=', $request->max_price));
                });
            })
            ->when($request->mode, fn ($q) => $q->where(fn ($q) => $q->where('teaching_mode', $request->mode)->orWhere('teaching_mode', 'both')))
            ->orderByDesc('rating_avg')
            ->paginate(9)
            ->withQueryString();

        $subjects = Subject::orderBy('name')->get();

        return view('marketplace.index', compact('tutors', 'subjects'));
    }
}
