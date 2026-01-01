<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Genre extends Model
{
    protected $fillable = [
        'name',
        'description',
        'parent_id',
    ];

    public function games(): BelongsToMany
    {
        return $this->belongsToMany(Game::class)
            ->withPivot('is_primary')
            ->withTimestamps();
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Genre::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(Genre::class, 'parent_id');
    }
}