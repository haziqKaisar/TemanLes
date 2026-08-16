<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    protected $fillable = ['order_id', 'student_id', 'tutor_id', 'rating', 'comment'];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function tutor(): BelongsTo
    {
        return $this->belongsTo(Tutor::class);
    }

    protected static function booted(): void
    {
        static::created(function (Review $review) {
            $tutor = $review->tutor;
            $avg = $tutor->reviews()->avg('rating');
            $count = $tutor->reviews()->count();
            $tutor->update(['rating_avg' => round($avg, 2), 'rating_count' => $count]);
        });
    }
}
