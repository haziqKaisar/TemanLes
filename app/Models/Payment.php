<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Payment extends Model
{
    protected $fillable = [
        'order_id', 'bank_account_id', 'amount', 'proof_file', 'transfer_date',
        'sender_name', 'status', 'rejection_reason', 'verified_by', 'verified_at',
    ];

    protected function casts(): array
    {
        return ['verified_at' => 'datetime', 'transfer_date' => 'date'];
    }

    public function getProofUrlAttribute(): ?string
    {
        $path = trim((string) $this->proof_file);

        if ($path === '') {
            return null;
        }

        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
            return $path;
        }

        $disk = Storage::disk(config('filesystems.payment_proofs_disk', 'public'));

        return $disk->exists($path) ? $disk->url($path) : null;
    }

    public function proofDisk()
    {
        return Storage::disk(config('filesystems.payment_proofs_disk', 'public'));
    }

    public function proofExists(): bool
    {
        $path = trim((string) $this->proof_file);

        if ($path === '') {
            return false;
        }

        return $this->proofDisk()->exists($path);
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function bankAccount(): BelongsTo
    {
        return $this->belongsTo(BankAccount::class);
    }

    public function verifier(): BelongsTo
    {
        return $this->belongsTo(User::class, 'verified_by');
    }
}
