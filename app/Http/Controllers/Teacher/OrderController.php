<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function complete(Order $order)
    {
        $tutor = Auth::user()->tutor;

        abort_unless($tutor && $order->tutor_id === $tutor->id, 403);
        abort_unless($order->status === 'confirmed', 400, 'Pesanan ini belum bisa ditandai selesai.');

        $order->markAsCompleted();

        return back()->with('success', "Pesanan {$order->order_code} berhasil ditandai selesai. Dana sudah masuk ke saldo kamu.");
    }
}
