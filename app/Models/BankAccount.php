<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BankAccount extends Model
{
    protected $fillable = ['bank_name', 'account_number', 'account_holder', 'is_active'];

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }
}
