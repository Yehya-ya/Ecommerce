<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToSalesTable extends Migration
{
    public function up()
    {
        Schema::table('cart_product', function (Blueprint $table) {
            $table->uuid('uuid')->unique()->after('id');
            $table->unsignedTinyInteger('cid')->default(USD)->after('unit_price');
        });
    }

    public function down()
    {
        Schema::table('cart_product', function (Blueprint $table) {
            $table->dropUnique(['uuid']);
            $table->dropColumn(['cid', 'uuid']);
        });
    }
}
