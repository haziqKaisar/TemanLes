<?php

namespace App\Http\Controllers;

use App\Models\BankAccount;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

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
    file_put_contents(storage_path('CANARY_TEST.txt'), 'Store dipanggil pada: ' . now() . "\n", FILE_APPEND);

    abort_unless($order->student_id === auth()->id(), 403);


        Log::info('PAYMENT UPLOAD DEBUG', [
            'has_file' => $request->hasFile('proof_file'),
            'all_files' => array_keys($request->allFiles()),
            'content_type' => $request->header('Content-Type'),
        ]);

        $data = $request->validate([
            'bank_account_id' => 'required|exists:bank_accounts,id',
            'proof_file' => 'required|file|mimes:jpg,jpeg,png,pdf|max:5120',
            'transfer_date' => 'required|date|before_or_equal:today',
            'sender_name' => 'required|string|max:255',
        ]);

        $file = $request->file('proof_file');

        Log::info('PAYMENT FILE DEBUG', [
            'exists' => $file !== null,
            'valid' => $file?->isValid(),
            'original_name' => $file?->getClientOriginalName(),
            'mime' => $file?->getMimeType(),
            'size' => $file?->getSize(),
        ]);

        $proofDisk = config('filesystems.payment_proofs_disk', 'public');

        if (! $file || ! $file->isValid()) {
            throw ValidationException::withMessages([
                'proof_file' => 'File bukti transfer tidak valid.',
            ]);
        }

        $path = $file->store('payment-proofs', $proofDisk);

        Log::info('PAYMENT STORAGE DEBUG', [
    'path' => $path,
    'exists' => Storage::disk($proofDisk)->exists($path),
    'size' => Storage::disk($proofDisk)->size($path),
]);

if (! $path || ! Storage::disk($proofDisk)->exists($path)) {
    throw ValidationException::withMessages([
        'proof_file' => 'Upload bukti transfer gagal disimpan. Coba upload ulang.',
    ]);
}

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
