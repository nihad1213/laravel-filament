<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Game extends Model
{
    protected $fillable = [
        'title',
        'description',
        'release_date',
        'cover_image',
        'metacritic_score',
        'price',
        'status',
    ];

    protected $casts = [
        'release_date' => 'date',
        'price' => 'decimal:2',
        'metacritic_score' => 'integer',
    ];

    public function designers(): BelongsToMany
    {
        return $this->belongsToMany(Designer::class)
            ->withPivot('role')
            ->withTimestamps();
    }

    public function publishers(): BelongsToMany
    {
        return $this->belongsToMany(Publisher::class)
            ->withPivot('region', 'publish_date')
            ->withTimestamps();
    }

    public function platforms(): BelongsToMany
    {
        return $this->belongsToMany(Platform::class)
            ->withPivot('release_date')
            ->withTimestamps();
    }

    public function genres(): BelongsToMany
    {
        return $this->belongsToMany(Genre::class)
            ->withPivot('is_primary')
            ->withTimestamps();
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class)
            ->withTimestamps();
    }

    public function screenshots(): HasMany
    {
        return $this->hasMany(Screenshot::class);
    }

    public function dlcs(): HasMany
    {
        return $this->hasMany(DLC::class, 'parent_game_id');
    }

    public function awards(): HasMany
    {
        return $this->hasMany(Award::class);
    }
}