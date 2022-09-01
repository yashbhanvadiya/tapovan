<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('lastname', 50);
            $table->string('firstname', 50);
            $table->string('middlename', 50);
            $table->date('birthdate');
            $table->tinyInteger('sex')->comment('1=male, 2=female');
            $table->string('address');
            $table->string('city');
            $table->BigInteger('pincode')->nullable();
            $table->integer('state')->default(1);
            $table->BigInteger('mobile');
            $table->BigInteger('other_mobile')->nullable();
            $table->string('email')->nullable();
            $table->integer('maritial_status')->comment('1=unmarried, 2=married, 3=divorced, 4=widow')->default(0);
            $table->integer('occupation')->comment('1=student, 2=service, 3=business, 4=housewife, 5=retired')->default(0);
            $table->string('designation', 50)->comment('1=super admin, 2=doctors, 3=nurse, 4=reception, 5=kitchen, 6=supervisor, 7=patient');  
            $table->string('company', 50)->nullable();
            $table->string('notes')->nullable();
            $table->text('image')->nullable();
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
        Schema::dropIfExists('patients');
    }
}
