<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function confirm(Order $order)
    {
        $tutor = Auth::user()->tutor;

        abort_unless($tutor && $order->tutor_id === $tutor->id, 403);
        abort_unless($order->status === 'confirmed', 400, 'Pesanan ini belum bisa dikonfirmasi.');

        $order->confirmByTeacher();

        $message = $order->student_confirmed_at
            ? "Pesanan {$order->order_code} sudah selesai. Dana sudah masuk ke saldo kamu."
            : 'Konfirmasi kamu tersimpan. Menunggu konfirmasi dari murid.';

        return back()->with('success', $message);
    }
}
