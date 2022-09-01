<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCreatedbyToDiseases extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('diseases', function (Blueprint $table) {
            $table->unsignedBigInteger('created_by')->after('name');
            $table->foreign('created_by')->references('id')->on('users')->default('null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('diseases', function (Blueprint $table) {
            //
        });
    }
}
