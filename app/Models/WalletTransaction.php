<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WalletTransaction extends Model
{
    protected $fillable = ['teacher_wallet_id', 'order_id', 'type', 'amount', 'balance_after', 'description'];

    public function wallet(): BelongsTo
    {
        return $this->belongsTo(TeacherWallet::class, 'teacher_wallet_id');
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
