<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Tutor;
use Illuminate\Http\Request;

class TutorMarketplaceController extends Controller
{
    public function index(Request $request)
    {
        $query = Tutor::query()
            ->where('verification_status', 'verified')
            ->with(['user', 'tutorSubjects.subject']);

        // Filter berdasarkan Mata Pelajaran atau Jenjang
        if ($request->filled('subject_id') || $request->filled('level') || $request->filled('min_price') || $request->filled('max_price')) {
            $query->whereHas('tutorSubjects', function ($q) use ($request) {
                if ($request->filled('subject_id')) {
                    $q->where('subject_id', $request->subject_id);
                }

                if ($request->filled('level')) {
                    $q->where('level', $request->level);
                }

                if ($request->filled('min_price')) {
                    $q->where('price_per_hour', '>=', $request->min_price);
                }

                if ($request->filled('max_price')) {
                    $q->where('price_per_hour', '<=', $request->max_price);
                }
            });
        }

        // Filter berdasarkan Cara Belajar (Online / Offline)
        if ($request->filled('mode')) {
            $mode = $request->mode;
            $query->where(function ($q) use ($mode) {
                $q->where('teaching_mode', $mode)
                  ->orWhere('teaching_mode', 'both');
            });
        }

        // Ambil data tutor yang telah difilter dengan pagination & sertakan query string agar pagnation tidak meng-clear filter
        $tutors = $query->paginate(9)->withQueryString();
        $subjects = Subject::all();

        return view('marketplace.index', compact('tutors', 'subjects'));
    }
}