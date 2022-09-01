<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->dropColumn('email_verified_at');
            $table->dropColumn('remember_token');
            $table->string('firstname', 50)->after('id');
            $table->string('middlename', 50)->after('firstname');
            $table->string('mobile')->after('email_verified_at')->nullable();
            $table->integer('role')->after('password')->comment('1.super admin, 2.doctors, 3.nurse, 4.reception, 5.kitchen, 6.supervisor')->default(3);
            $table->tinyInteger('status')->after('role')->comment('0=active, 1=inactive');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
