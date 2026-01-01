<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Publisher extends Model
{
    protected $fillable = [
        'name',
        'description',
        'logo',
        'founded_date',
        'country',
        'website',
        'status',
    ];

    protected $casts = [
        'founded_date' => 'date',
    ];

    public function games(): BelongsToMany
    {
        return $this->belongsToMany(Game::class)
            ->withPivot('region', 'publish_date')
            ->withTimestamps();
    }
}