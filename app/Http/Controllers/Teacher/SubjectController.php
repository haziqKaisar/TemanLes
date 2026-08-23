<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use App\Models\TutorSubject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    public function index()
    {
        $tutor = Auth::user()->tutor;
        abort_unless($tutor, 404, 'Profil guru belum diatur.');

        $tutorSubjects = $tutor->tutorSubjects()->with('subject')->orderBy('subject_id')->get();
        $subjects = Subject::orderBy('name')->get();

        return view('teacher.subjects', compact('tutorSubjects', 'subjects'));
    }

    public function store(Request $request)
    {
        $tutor = Auth::user()->tutor;
        abort_unless($tutor, 404);

        $data = $request->validate([
            'subject_id' => 'required|exists:subjects,id',
            'level' => 'required|in:SD,SMP,SMA,Umum',
            'price_per_hour' => 'required|numeric|min:10000|max:5000000',
        ]);

        $exists = TutorSubject::where('tutor_id', $tutor->id)
            ->where('subject_id', $data['subject_id'])
            ->where('level', $data['level'])
            ->exists();

        if ($exists) {
            return back()->withErrors(['subject_id' => 'Kombinasi mapel & jenjang ini sudah kamu tambahkan.'])->withInput();
        }

        TutorSubject::create([
            'tutor_id' => $tutor->id,
            'subject_id' => $data['subject_id'],
            'level' => $data['level'],
            'price_per_hour' => $data['price_per_hour'],
            'is_active' => true,
        ]);

        return back()->with('success', 'Mapel berhasil ditambahkan.');
    }

    public function update(Request $request, TutorSubject $tutorSubject)
    {
        $tutor = Auth::user()->tutor;
        abort_unless($tutor && $tutorSubject->tutor_id === $tutor->id, 403);

        $data = $request->validate([
            'price_per_hour' => 'required|numeric|min:10000|max:5000000',
        ]);

        $tutorSubject->update(['price_per_hour' => $data['price_per_hour']]);

        return back()->with('success', 'Harga berhasil diperbarui.');
    }

    public function destroy(TutorSubject $tutorSubject)
    {
        $tutor = Auth::user()->tutor;
        abort_unless($tutor && $tutorSubject->tutor_id === $tutor->id, 403);

        $tutorSubject->delete();

        return back()->with('success', 'Mapel berhasil dihapus.');
    }
}
