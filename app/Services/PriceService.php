<?php

namespace App\Services;

use App\Models\CurrencyRate;

class PriceService
{
    public function getPrice(int $amount, string $from, string $to): float
    {
        $currency_rate = CurrencyRate::where('from', $from)->where('to', $to)->first();
        if (! $currency_rate) {
            return $amount;
        }

        return  $currency_rate->getAmount($amount);
    }
}
