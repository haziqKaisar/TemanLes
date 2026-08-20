<?php

namespace App\Http\Controllers;

use App\Models\BankAccount;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function create(Order $order)
    {
        abort_unless($order->student_id === auth()->id(), 403);
        $bankAccounts = BankAccount::where('is_active', true)->get();
        return view('booking.payment', compact('order', 'bankAccounts'));
    }

    public function store(Request $request, Order $order)
    {
        abort_unless($order->student_id === auth()->id(), 403);

        $data = $request->validate([
            'bank_account_id' => 'required|exists:bank_accounts,id',
            'proof_file' => 'required|file|mimes:jpg,jpeg,png,pdf|max:5120',
            'transfer_date' => 'required|date|before_or_equal:today',
            'sender_name' => 'required|string|max:255',
        ]);

        $path = $request->file('proof_file')->store('payment-proofs', 'public');

        Payment::create([
            'order_id' => $order->id,
            'bank_account_id' => $data['bank_account_id'],
            'amount' => $order->total_price,
            'proof_file' => $path,
            'transfer_date' => $data['transfer_date'],
            'sender_name' => $data['sender_name'],
            'status' => 'pending',
        ]);

        $order->update(['status' => 'waiting_verification']);

        return redirect()->route('payment.success', $order);
    }

    public function success(Order $order)
    {
        return view('booking.success', compact('order'));
    }
}
