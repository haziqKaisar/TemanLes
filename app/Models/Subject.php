<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subject extends Model
{
    protected $fillable = ['name', 'slug', 'icon'];

    public function tutorSubjects(): HasMany
    {
        return $this->hasMany(TutorSubject::class);
    }
}
