<?php

namespace App\Models;

use App\Services\PriceService;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Sale extends Pivot
{
    use SoftDeletes;

    public $incrementing = true;

    protected $table = 'cart_product';

    protected $fillable = [
        'uuid',
        'cid',
        'quantity',
        'unit_price',
    ];

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
        } while (! empty($existing));

        $this->uuid = $uuid;
    }

    public function getPriceAttribute(): int
    {
        $cid = 'USD';
        if ($user = auth()->user()) {
            $cid = $user->getSetting('currency', 'USD');
        }

        return (new PriceService())->getPrice($this->unit_price * $this->quantity, $this->cid, $cid);
    }

    public function getFormatedPriceAttribute(): string
    {
        $cid = 'USD';
        if (auth()->check()) {
            $cid = auth()->user()->getSetting('currency', 'USD');
        }

        return config('currency.symbols.'.$cid).number_format($this->price / 100, 2);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function cart(): BelongsTo
    {
        return $this->belongsTo(Cart::class);
    }

    public function checkout(): void
    {
        $this->product->stock -= $this->quantity;
        $this->product->save();
    }
}
