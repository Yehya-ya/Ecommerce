<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('username', 20)->unique()->after('id');
            $table->string('name', 20)->after('password')->change();
            $table->string('surname', 20)->after('password');
            $table->renameColumn('name', 'fname');
            $table->boolean('is_active')->default(true)->after('surname');
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropUnique(['username']);
            $table->dropColumn(['username', 'surname', 'is_active']);
            $table->string('fname')->after('id')->change();
            $table->renameColumn('fname', 'name');
            $table->dropSoftDeletes();
        });
    }
}
