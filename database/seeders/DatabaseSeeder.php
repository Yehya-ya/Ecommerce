<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\CurrencyRate;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        /** USD */
        CurrencyRate::updateOrCreate([
            'from' => 'USD',
            'to' => 'EUR',
        ], [
            'amount' => CurrencyRate::getAmountInt(0.92),
        ]);

        CurrencyRate::updateOrCreate([
            'from' => 'USD',
            'to' => 'TRY',
        ], [
            'amount' => CurrencyRate::getAmountInt(30.28),
        ]);

        CurrencyRate::updateOrCreate([
            'from' => 'USD',
            'to' => 'AED',
        ], [
            'amount' => CurrencyRate::getAmountInt(3.67),
        ]);

        /** EUR */
        CurrencyRate::updateOrCreate([
            'from' => 'EUR',
            'to' => 'USD',
        ], [
            'amount' => CurrencyRate::getAmountInt(1.09),
        ]);

        CurrencyRate::updateOrCreate([
            'from' => 'EUR',
            'to' => 'TRY',
        ], [
            'amount' => CurrencyRate::getAmountInt(32.86),
        ]);

        CurrencyRate::updateOrCreate([
            'from' => 'EUR',
            'to' => 'AED',
        ], [
            'amount' => CurrencyRate::getAmountInt(3.99),
        ]);

        /** TRY */
        CurrencyRate::updateOrCreate([
            'from' => 'TRY',
            'to' => 'USD',
        ], [
            'amount' => CurrencyRate::getAmountInt(0.033),
        ]);

        CurrencyRate::updateOrCreate([
            'from' => 'TRY',
            'to' => 'EUR',
        ], [
            'amount' => CurrencyRate::getAmountInt(0.030),
        ]);

        CurrencyRate::updateOrCreate([
            'from' => 'TRY',
            'to' => 'AED',
        ], [
            'amount' => CurrencyRate::getAmountInt(0.12),
        ]);

        /** AED */
        CurrencyRate::updateOrCreate([
            'from' => 'AED',
            'to' => 'USD',
        ], [
            'amount' => CurrencyRate::getAmountInt(0.27),
        ]);

        CurrencyRate::updateOrCreate([
            'from' => 'AED',
            'to' => 'EUR',
        ], [
            'amount' => CurrencyRate::getAmountInt(0.25),
        ]);

        CurrencyRate::updateOrCreate([
            'from' => 'AED',
            'to' => 'TRY',
        ], [
            'amount' => CurrencyRate::getAmountInt(8.24),
        ]);
    }
}
