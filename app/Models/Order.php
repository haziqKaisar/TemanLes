<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Order extends Model
{
    protected $fillable = [
        'order_code', 'student_id', 'tutor_id', 'tutor_subject_id', 'teaching_mode',
        'scheduled_date', 'scheduled_time', 'duration_minutes',
        'location_lat', 'location_lng', 'location_address', 'location_note',
        'price_per_hour', 'total_price', 'admin_commission_percent',
        'admin_commission_amount', 'tutor_earning_amount', 'status',
        'cancel_reason', 'completed_at', 'student_confirmed_at', 'teacher_confirmed_at',
    ];

    protected function casts(): array
    {
        return [
            'scheduled_date' => 'date',
            'completed_at' => 'datetime',
            'student_confirmed_at' => 'datetime',
            'teacher_confirmed_at' => 'datetime',
        ];
    }

    protected static function booted(): void
    {
        static::creating(function (Order $order) {
            $order->order_code = $order->order_code ?: 'ORD-' . strtoupper(Str::random(8));
        });
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function tutor(): BelongsTo
    {
        return $this->belongsTo(Tutor::class);
    }

    public function tutorSubject(): BelongsTo
    {
        return $this->belongsTo(TutorSubject::class);
    }

    public function payment(): HasOne
    {
        return $this->hasOne(Payment::class);
    }

    public function review(): HasOne
    {
        return $this->hasOne(Review::class);
    }

    /** Gabungan tanggal + jam jadwal les, sebagai satu waktu Carbon. */
    public function getScheduledAtAttribute(): \Carbon\Carbon
    {
        return \Carbon\Carbon::parse($this->scheduled_date->format('Y-m-d') . ' ' . $this->scheduled_time);
    }

    public function calculatePricing(float $pricePerHour, int $durationMinutes, float $commissionPercent = 10): void
    {
        $total = round($pricePerHour * ($durationMinutes / 60), 2);
        $commission = round($total * ($commissionPercent / 100), 2);

        $this->price_per_hour = $pricePerHour;
        $this->total_price = $total;
        $this->admin_commission_percent = $commissionPercent;
        $this->admin_commission_amount = $commission;
        $this->tutor_earning_amount = $total - $commission;
    }

    /** Murid konfirmasi les sudah selesai. Kalau guru juga sudah, order langsung diselesaikan. */
    public function confirmByStudent(): void
    {
        if ($this->student_confirmed_at) {
            return;
        }

        $this->update(['student_confirmed_at' => now()]);

        if ($this->teacher_confirmed_at) {
            $this->finalizeCompletion();
        }
    }

    /** Guru konfirmasi les sudah diajarkan. Kalau murid juga sudah, order langsung diselesaikan. */
    public function confirmByTeacher(): void
    {
        if ($this->teacher_confirmed_at) {
            return;
        }

        $this->update(['teacher_confirmed_at' => now()]);

        if ($this->student_confirmed_at) {
            $this->finalizeCompletion();
        }
    }

    /** Dipanggil otomatis begitu KEDUA pihak sudah konfirmasi — cairkan dana ke wallet guru. */
    protected function finalizeCompletion(): void
    {
        if ($this->status === 'completed') {
            return;
        }

        DB::transaction(function () {
            $this->update(['status' => 'completed', 'completed_at' => now()]);

            $wallet = TeacherWallet::firstOrCreate(['tutor_id' => $this->tutor_id]);
            $wallet->balance += $this->tutor_earning_amount;
            $wallet->total_earned += $this->tutor_earning_amount;
            $wallet->save();

            WalletTransaction::create([
                'teacher_wallet_id' => $wallet->id,
                'order_id' => $this->id,
                'type' => 'credit',
                'amount' => $this->tutor_earning_amount,
                'balance_after' => $wallet->balance,
                'description' => "Pendapatan les #{$this->order_code}",
            ]);
        });
    }
}
