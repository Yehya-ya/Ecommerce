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
            $rates = Currency::rates()
                ->latest()
                ->symbols(array_diff($currencies, [$currency]))
                ->base($currency)
                ->get();

            $values = [];
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
