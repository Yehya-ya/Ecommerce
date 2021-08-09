<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'price',
        'stock',
    ];

    public function categories() : BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function carts(): BelongsToMany
    {
        return $this->belongsToMany(Cart::class)
            ->using(Sale::class)
            ->as('sales')
            ->withPivot('status')
            ->withTimestamps();
    }
}
