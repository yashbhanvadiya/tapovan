<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToPatientTreatments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('patient_treatments', function (Blueprint $table) {
            $table->date('start_date')->after('patient_treatments')->nullable();
            $table->date('end_date')->after('start_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('patient_treatments', function (Blueprint $table) {
            //
        });
    }
}
