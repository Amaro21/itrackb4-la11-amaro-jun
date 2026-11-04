<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Movie extends Model
{
    protected $fillable = ['title', 'genre_id', 'rating', 'year', 'is_blockbuster', 'director'];

    protected function casts(): array
    {
        return [
            'is_blockbuster' => 'boolean',
            'rating' => 'integer',
            'year' => 'integer',
        ];
    }

    public function genre(): BelongsTo
    {
        return $this->belongsTo(Genre::class);
    }
}
