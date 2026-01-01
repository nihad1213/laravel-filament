<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Platform extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'manufacturer',
        'type',
        'release_date',
        'icon',
        'is_active',
    ];

    protected $casts = [
        'release_date' => 'date',
        'is_active' => 'boolean',
    ];

    public function games(): BelongsToMany
    {
        return $this->belongsToMany(Game::class)
            ->withPivot('release_date')
            ->withTimestamps();
    }
}