<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Jobs\CurrencyRateJop;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::factory()->create([
            'username' => 'Admin',
            'email' => 'admin@admin.com',
            'fname' => 'admin',
            'surname' => 'admin',
            'password' => Hash::make('admin'),
            'is_admin' => true,
        ]);

        CurrencyRateJop::dispatch();
    }
}
