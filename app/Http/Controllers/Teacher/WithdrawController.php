<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Payout;
use App\Models\TeacherWallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WithdrawController extends Controller
{
    public function create()
    {
        $wallet = TeacherWallet::firstOrCreate(['tutor_id' => Auth::user()->tutor->id]);
        return view('teacher.withdraw', compact('wallet'));
    }

    public function store(Request $request)
    {
        $wallet = TeacherWallet::firstOrCreate(['tutor_id' => Auth::user()->tutor->id]);

        $data = $request->validate([
            'amount' => 'required|numeric|min:50000|max:' . $wallet->balance,
            'bank_name' => 'required|string|max:255',
            'account_number' => 'required|string|max:50',
            'account_holder' => 'required|string|max:255',
        ]);

        Payout::create([
            'tutor_id' => Auth::user()->tutor->id,
            'teacher_wallet_id' => $wallet->id,
            'amount' => $data['amount'],
            'bank_name' => $data['bank_name'],
            'account_number' => $data['account_number'],
            'account_holder' => $data['account_holder'],
            'status' => 'pending',
        ]);

        return back()->with('success', 'Pengajuan penarikan saldo berhasil dikirim, menunggu ACC Admin.');
    }
}
