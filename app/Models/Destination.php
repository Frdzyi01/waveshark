<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Destination extends Model
{
    protected $fillable = [
        'name',
        'slug',
    ];

    /**
     * Get the categories for this destination.
     */
    public function categories(): HasMany
    {
        return $this->hasMany(Category::class);
    }
}
