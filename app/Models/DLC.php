<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DLC extends Model
{
    protected $table = 'dlcs';

    protected $fillable = [
        'parent_game_id',
        'title',
        'description',
        'release_date',
        'price',
        'type',
    ];

    protected $casts = [
        'release_date' => 'date',
        'price' => 'decimal:2',
    ];

    public function parentGame(): BelongsTo
    {
        return $this->belongsTo(Game::class, 'parent_game_id');
    }
}