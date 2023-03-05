<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

new class extends Migration
{
    public function up()
    {
        Schema::create('currency_rates', function (Blueprint $table) {
            $table->id();
            $table->string('from', 3);
            $table->string('to', 3);
            $table->unsignedInteger('amount');
            $table->timestamps();

            $table->unique(['from', 'to']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('currency_rates');
    }
};
