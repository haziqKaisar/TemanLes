<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PaymentApprovalController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->get('status', 'pending');

        $payments = Payment::with(['order.student', 'order.tutor.user'])
            ->when($status, fn ($q) => $q->where('status', $status))
            ->when($request->search, function ($q) use ($request) {
                $q->whereHas('order', function ($q) use ($request) {
                    $q->where('order_code', 'like', "%{$request->search}%")
                        ->orWhereHas('student', fn ($q) => $q->where('name', 'like', "%{$request->search}%"));
                });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.payments.index', compact('payments', 'status'));
    }

    public function show(Payment $payment)
    {
        $payment->load(['order.student', 'order.tutor.user', 'order.tutorSubject.subject', 'bankAccount']);
        return view('admin.payments.show', compact('payment'));
    }

    public function approve(Payment $payment)
    {
        abort_unless($payment->status === 'pending', 400);

        DB::transaction(function () use ($payment) {
            $payment->update([
                'status' => 'approved',
                'verified_by' => Auth::id(),
                'verified_at' => now(),
            ]);
            $payment->order->update(['status' => 'confirmed']);
        });

        return redirect()->route('admin.payments')->with('success', 'Pembayaran berhasil disetujui.');
    }

    public function reject(Request $request, Payment $payment)
    {
        abort_unless($payment->status === 'pending', 400);

        $request->validate(['rejection_reason' => 'required|string|min:5|max:500']);

        DB::transaction(function () use ($payment, $request) {
            $payment->update([
                'status' => 'rejected',
                'rejection_reason' => $request->rejection_reason,
                'verified_by' => Auth::id(),
                'verified_at' => now(),
            ]);
            $payment->order->update(['status' => 'pending_payment']);
        });

        return redirect()->route('admin.payments')->with('success', 'Pembayaran ditolak.');
    }
}
