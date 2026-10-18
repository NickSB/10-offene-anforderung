<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'city',
        'hourly_rate',
    ];

    protected function casts(): array
    {
        return [
            'hourly_rate' => 'decimal:2',
        ];
    }

    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
    }

    public function timeEntries(): HasManyThrough
    {
        return $this->hasManyThrough(TimeEntry::class, Project::class);
    }
}
