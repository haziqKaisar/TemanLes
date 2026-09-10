<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function create(Order $order)
    {
        abort_unless($order->student_id === Auth::id(), 403);
        abort_unless($order->student_confirmed_at, 400, 'Konfirmasi dulu bahwa les sudah selesai sebelum memberi ulasan.');

        if ($order->review) {
            return redirect()->route('student.dashboard')->with('success', 'Kamu sudah memberi ulasan untuk pesanan ini.');
        }

        return view('student.review', compact('order'));
    }

    public function store(Request $request, Order $order)
    {
        abort_unless($order->student_id === Auth::id(), 403);
        abort_unless($order->student_confirmed_at, 400);

        if ($order->review) {
            return redirect()->route('student.dashboard');
        }

        $data = $request->validate([
            'rating' => 'required|integer|between:1,5',
            'comment' => 'nullable|string|max:1000',
        ]);

        Review::create([
            'order_id' => $order->id,
            'student_id' => Auth::id(),
            'tutor_id' => $order->tutor_id,
            'rating' => $data['rating'],
            'comment' => $data['comment'] ?? null,
        ]);

        return redirect()->route('student.dashboard')->with('success', 'Terima kasih! Ulasan kamu berhasil dikirim.');
    }
}
