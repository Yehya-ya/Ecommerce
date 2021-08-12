<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Sale extends Pivot
{
    use SoftDeletes;

    public $incrementing = true;

    protected $table = 'cart_product';

    // protected $fillable = [
    //     'uuid',
    //     'cid',
    // ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function (Sale $model) {
            $model->generateCode();
        });
    }

    private function generateCode()
    {
        do {
            // Make sure it is unique
            $uuid = Str::uuid();
            $existing = Sale::where('uuid', $uuid)->first();
        } while (!empty($existing));

        $this->uuid = $uuid;
    }

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
