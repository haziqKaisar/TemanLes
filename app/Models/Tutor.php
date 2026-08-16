<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Tutor extends Model
{
    protected $fillable = [
        'user_id', 'headline', 'bio', 'education', 'certificate_path',
        'experience_years', 'teaching_mode', 'default_latitude', 'default_longitude',
        'default_address', 'verification_status', 'rejection_reason', 'is_active',
        'rating_avg', 'rating_count',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function tutorSubjects(): HasMany
    {
        return $this->hasMany(TutorSubject::class);
    }

    public function availabilities(): HasMany
    {
        return $this->hasMany(TutorAvailability::class);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function wallet(): HasOne
    {
        return $this->hasOne(TeacherWallet::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function scopeVerified($query)
    {
        return $query->where('verification_status', 'verified')->where('is_active', true);
    }
}
