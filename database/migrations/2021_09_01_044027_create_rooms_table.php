<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('typeid'); 
            $table->foreign('typeid')->references('id')->on('roomtypes');
            $table->integer('roomno');
            $table->string('bed', 2);
            $table->float('cost');
            $table->tinyInteger('isbooked')->comment('0=active, 1=inactive');
            $table->tinyInteger('status')->comment('0=active, 1=inactive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
