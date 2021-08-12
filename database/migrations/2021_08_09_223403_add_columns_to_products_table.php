<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToProductsTable extends Migration
{
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->foreignIdFor(User::class)->nullable()->after('id');
            $table->string('slug')->after('description');
            $table->unsignedTinyInteger('cid')->default(USD)->after('price');
            $table->boolean('is_active')->default(true)->after('stock');
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['cid', 'slug', 'is_active', 'user_id']);
            $table->dropSoftDeletes();
        });
    }
}
