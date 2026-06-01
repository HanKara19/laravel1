<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title',
        'price',
        'description',
        'stock',
];
    public function category(): BelongsTo   
    {
        return $this->belongsTo(Category::class);
    }
}