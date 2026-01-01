<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Designer extends Model
{
    protected $fillable = [
        'name',
        'description',
        'logo',
        'founded_date',
        'country',
        'website',
        'is_indie',
        'employee_count',
        'status',
    ];

    protected $casts = [
        'founded_date' => 'date',
        'is_indie' => 'boolean',
    ];

    public function games(): BelongsToMany
    {
        return $this->belongsToMany(Game::class)
            ->withPivot('role')
            ->withTimestamps();
    }
}