<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Platform extends Model
{
    protected $fillable = [
        'name',
        'manufacturer',
        'release_date',
    ];

    protected $casts = [
        'release_date' => 'date',
    ];

    public function games(): BelongsToMany
    {
        return $this->belongsToMany(Game::class)
            ->withPivot('release_date')
            ->withTimestamps();
    }
}