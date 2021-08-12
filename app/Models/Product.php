<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    // protected $fillable = [
    //     'title',
    //     'description',
    //     'price',
    //     'stock',
    //     'slug',
    //     'cid',
    //     'is_active',
    // ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

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
