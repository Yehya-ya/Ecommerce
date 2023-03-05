<?php

namespace App\Models;

use App\Services\PriceService;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory, SoftDeletes, CascadeSoftDeletes;

    protected $cascadeDeletes = ['sales', 'categoryRelations'];

    protected $fillable = [
        'title',
        'description',
        'value',
        'stock',
        'slug',
        'cid',
        'is_active',
    ];

    protected $casts = [
        'deleted_at' => 'datetime'
    ];

    // Override
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public static function slug($title, $id = -1): string
    {
        $slug = Str::slug($title, '-');
        $existing = Product::where('slug', $slug)->whereNotIn('id', [$id])->first();
        $i = 2;
        while (!empty($existing)) {
            $slug = Str::slug($title . ' ' . $i, '-');
            $existing = Product::where('slug', $slug)->whereNotIn('id', [$id])->first();
            $i++;
        }

        return $slug;
    }

    public function getPriceAttribute()
    {
        $cid = $this->cid;
        if ($user = auth()->user()) {
            $cid = $user->getSetting('currency', 'USD');
        }

        return (new PriceService)->getPrice($this->value, $this->cid, $cid);
    }

    public function getFormatedPriceAttribute()
    {
        $cid = $this->cid;
        if (auth()->check()) {
            $cid = auth()->user()->getSetting('currency', 'USD');
        }
        return config('currency.symbols.' . $cid) . number_format($this->price / 100, 2);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function categoryRelations(): HasMany
    {
        return $this->hasMany(CategoryProductRelation::class);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function sales(): HasMany
    {
        return $this->hasMany(Sale::class);
    }

    public function carts(): BelongsToMany
    {
        return $this->belongsToMany(Cart::class)
            ->using(Sale::class)
            ->as('sales')
            ->withPivot(['quantity', 'unit_price', 'cid', 'id'])
            ->withTimestamps();
    }
}
