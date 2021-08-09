<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cart extends Model
{
    use HasFactory;

    static public $PENDING = 0;
    static public $COMPLETED = 1;
    static public $CANCELED = 2;
    static public $FAILED = 3;

    protected $fillable = ['status'];

    public function user(): BelongsTo
    {
        return  $this->belongsTo(User::class);
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class)
            ->using(Sale::class)
            ->as('sale')
            ->withPivot(['quantity', 'unit_price', 'id'])
            ->withTimestamps();
    }

    public function sales(): HasMany
    {
        return $this->hasMany(Sale::class);
    }

    public function getPriceAttribute() : int
    {
        $sum = 0;
        foreach ($this->products as $product) {
            $sum += $product->sale->unit_price * $product->sale->quantity;
        }
        return $sum;
    }

    public function validate() : bool
    {
        foreach ($this->products as $product) {
            if ($product->sale->quantity > $product->stock) {
                return false;
            }
        }
        return true;
    }

    public function pay() : bool
    {
        if ($this->validate()) {
            foreach ($this->sales as $sale) {
                $sale->checkout();
            }
            $this->status = Cart::$COMPLETED;
            $this->save();
            return true;
        }
        $this->status = Cart::$FAILED;
        $this->save();
        return false;
    }

    public function cancel() : void
    {
        $this->status = Cart::$CANCELED;
        $this->save();
    }
}