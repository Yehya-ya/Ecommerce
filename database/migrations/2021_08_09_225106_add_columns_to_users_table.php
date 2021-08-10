<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('name', 20)->change();
            $table->renameColumn('name', 'username');
            $table->string('fname', 20)->after('password');
            $table->string('surname', 20)->after('fname');
            $table->unsignedTinyInteger('status')->default(ACTIVE)->after('email');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['fname', 'surname', 'status']);
            $table->string('username')->change();
            $table->renameColumn('username', 'name');
        });
    }
}
