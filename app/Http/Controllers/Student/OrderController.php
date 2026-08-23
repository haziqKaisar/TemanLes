<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function confirm(Order $order)
    {
        abort_unless($order->student_id === Auth::id(), 403);
        abort_unless($order->status === 'confirmed', 400, 'Pesanan ini belum bisa dikonfirmasi.');

        $order->confirmByStudent();

        $message = $order->teacher_confirmed_at
            ? "Pesanan {$order->order_code} sudah selesai. Terima kasih sudah konfirmasi!"
            : 'Konfirmasi kamu tersimpan. Menunggu konfirmasi dari guru.';

        return back()->with('success', $message);
    }
}
