<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tutor;
use Illuminate\Http\Request;

class TutorVerificationController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->get('status', 'pending');

        $tutors = Tutor::with('user')
            ->when($status, fn ($q) => $q->where('verification_status', $status))
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.tutors.index', compact('tutors', 'status'));
    }

    public function approve(Tutor $tutor)
    {
        $tutor->update(['verification_status' => 'verified', 'rejection_reason' => null]);

        return back()->with('success', "Guru {$tutor->user->name} berhasil diverifikasi.");
    }

    public function reject(Request $request, Tutor $tutor)
    {
        $request->validate(['rejection_reason' => 'required|string|min:5|max:500']);

        $tutor->update([
            'verification_status' => 'rejected',
            'rejection_reason' => $request->rejection_reason,
        ]);

        return back()->with('success', "Pendaftaran guru {$tutor->user->name} ditolak.");
    }
}
