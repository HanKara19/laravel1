<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Category extends Model
{
    protected $fillable = [
        'title',
        'parent_id',
    ];

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function getFullPathAttribute(): string
    {
        $titles = [];
        $current = $this;

        while ($current) {
            $titles[] = $current->title;

            if (!$current->parent_id || $current->parent_id == 0) {
                break;
            }

            $current = $current->parent;
        }

        return implode(' -> ', array_reverse($titles));
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}