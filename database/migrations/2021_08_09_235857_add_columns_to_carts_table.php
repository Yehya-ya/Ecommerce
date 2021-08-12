<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToCartsTable extends Migration
{
    public function up()
    {
        Schema::table('carts', function (Blueprint $table) {
            $table->uuid('uuid')->unique()->after('id');
            $table->timestamp('completed_at')->nullable()->after('status');
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::table('carts', function (Blueprint $table) {
            $table->dropUnique(['uuid']);
            $table->dropColumn(['completed_at', 'uuid']);
            $table->dropSoftDeletes();
        });
    }
}
