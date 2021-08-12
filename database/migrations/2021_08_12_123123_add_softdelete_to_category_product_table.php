<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSoftdeleteToCategoryProductTable extends Migration
{
    public function up()
    {
        Schema::table('category_product', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::table('category_product', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
