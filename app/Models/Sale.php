<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Sale extends Pivot
{
    public $incrementing = true;

    protected $table = 'cart_product';

    public function product() : BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function cart() : BelongsTo
    {
        return $this->belongsTo(Cart::class);
    }

    public function checkout() : void
    {
        $this->product->stock -= $this->quantity;
        $this->product->save();
    }
}
