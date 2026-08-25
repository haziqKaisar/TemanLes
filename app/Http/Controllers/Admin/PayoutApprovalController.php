<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PayoutApprovalController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->get('status', 'pending');
        abort_unless(in_array($status, ['pending', 'approved', 'paid', 'rejected'], true), 404);

        $payouts = Payout::with('tutor.user')
            ->when($status, fn ($q) => $q->where('status', $status))
            ->when($request->search, fn ($q) => $q->whereHas('tutor.user', fn ($user) => $user->where('name', 'like', '%' . $request->search . '%')))
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $statusCounts = Payout::selectRaw('status, count(*) as total')->groupBy('status')->pluck('total', 'status');

        return view('admin.payouts.index', compact('payouts', 'status', 'statusCounts'));
    }

    public function approve(Payout $payout)
    {
        abort_unless($payout->status === 'pending', 400);

        DB::transaction(function () use ($payout) {
            $wallet = $payout->wallet;
            abort_if($wallet->balance < $payout->amount, 422, 'Saldo guru tidak mencukupi.');

            $wallet->balance -= $payout->amount;
            $wallet->total_withdrawn += $payout->amount;
            $wallet->save();

            $payout->update([
                'status' => 'paid',
                'processed_by' => Auth::id(),
                'processed_at' => now(),
            ]);

            $wallet->transactions()->create([
                'order_id' => null,
                'type' => 'debit',
                'amount' => $payout->amount,
                'balance_after' => $wallet->balance,
                'description' => "Pencairan dana ke {$payout->bank_name} - {$payout->account_number}",
            ]);
        });

        return back()->with('success', 'Penarikan disetujui & ditandai sudah dibayar.');
    }

    public function reject(Payout $payout)
    {
        abort_unless($payout->status === 'pending', 400);

        $payout->update([
            'status' => 'rejected',
            'admin_note' => 'Ditolak oleh admin',
            'processed_by' => Auth::id(),
            'processed_at' => now(),
        ]);

        return back()->with('success', 'Penarikan ditolak.');
    }
}
