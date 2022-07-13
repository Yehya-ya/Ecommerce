<?php

namespace App\Jobs;

use AmrShawky\LaravelCurrency\Facade\Currency;
use App\Models\CurrencyRate;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;


class CurrencyRateJop implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct()
    {
        $this->onConnection('database');
        $this->onQueue('default');
    }

    public function handle()
    {
        $currencies = config('currency.currencies');
        foreach ($currencies as $currency) {
            $otherCurrencies = array_diff($currencies, [$currency]);
            $rates = Currency::rates()
                ->latest()
                ->symbols($otherCurrencies)
                ->base($currency)
                ->get();

            $values = [];

            if (is_null($rates)) {
                Log::error("could not get the currency exchange rate form {$currency} to {$otherCurrencies}");
                return;
            }


            foreach ($rates as $key => $rate) {
                if ($rate = CurrencyRate::getAmountInt($rate)) {
                    $values[] = [
                        'from' => $currency,
                        'to' => $key,
                        'amount' => $rate,
                    ];
                }
            }

            CurrencyRate::upsert($values,['from', ['to'], ['amount']]);
        }
    }
}
