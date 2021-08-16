<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurrencyRate extends Model
{
    use HasFactory;

    protected $fillable =[
        'from',
        'to',
        'amount',
    ];

    public static function getAmountInt($amount)
    {
        if (!is_numeric($amount)) {
            return null;
        }

        return (int) ($amount * 100000);
    }

    public function getAmount(int $amount)
    {
        return $amount * ($this->amount / 100000);
    }
}
