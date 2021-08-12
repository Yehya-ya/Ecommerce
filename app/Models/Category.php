<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    // protected $fillable = [
    //     'title',
    //     'description',
    //     'slug',
    //     'is_active',
    // ];

    public function products() : BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }
}
