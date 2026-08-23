<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\TutorAvailability;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    public function index()
    {
        $tutor = Auth::user()->tutor;
        abort_unless($tutor, 404, 'Profil guru belum diatur.');

        $availabilities = $tutor->availabilities()->orderBy('day_of_week')->orderBy('start_time')->get();

        return view('teacher.schedule', compact('availabilities'));
    }

    public function store(Request $request)
    {
        $tutor = Auth::user()->tutor;
        abort_unless($tutor, 404);

        $data = $request->validate([
            'day_of_week' => 'required|integer|between:0,6',
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
        ]);

        TutorAvailability::create([
            'tutor_id' => $tutor->id,
            'day_of_week' => $data['day_of_week'],
            'start_time' => $data['start_time'],
            'end_time' => $data['end_time'],
            'is_active' => true,
        ]);

        return back()->with('success', 'Jadwal berhasil ditambahkan.');
    }

    public function destroy(TutorAvailability $tutorAvailability)
    {
        $tutor = Auth::user()->tutor;
        abort_unless($tutor && $tutorAvailability->tutor_id === $tutor->id, 403);

        $tutorAvailability->delete();

        return back()->with('success', 'Jadwal berhasil dihapus.');
    }
}
