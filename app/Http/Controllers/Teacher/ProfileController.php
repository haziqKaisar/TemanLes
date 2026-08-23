<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit()
    {
        $tutor = Auth::user()->tutor;
        abort_unless($tutor, 404, 'Profil guru belum diatur. Hubungi admin.');

        return view('teacher.profile', compact('tutor'));
    }

    public function update(Request $request)
    {
        $tutor = Auth::user()->tutor;
        abort_unless($tutor, 404);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:30',
            'headline' => 'required|string|max:255',
            'bio' => 'nullable|string|max:2000',
            'education' => 'nullable|string|max:255',
            'experience_years' => 'required|integer|min:0|max:60',
            'teaching_mode' => 'required|in:online,offline,both',
            'default_address' => 'nullable|string|max:500',
            'default_latitude' => 'nullable|numeric|between:-90,90',
            'default_longitude' => 'nullable|numeric|between:-180,180',
        ]);

        Auth::user()->update([
            'name' => $data['name'],
            'phone' => $data['phone'] ?? null,
        ]);

        $tutor->update([
            'headline' => $data['headline'],
            'bio' => $data['bio'] ?? null,
            'education' => $data['education'] ?? null,
            'experience_years' => $data['experience_years'],
            'teaching_mode' => $data['teaching_mode'],
            'default_address' => $data['default_address'] ?? null,
            'default_latitude' => $data['default_latitude'] ?? null,
            'default_longitude' => $data['default_longitude'] ?? null,
        ]);

        return back()->with('success', 'Profil berhasil diperbarui.');
    }
}
