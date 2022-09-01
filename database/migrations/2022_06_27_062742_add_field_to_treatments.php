<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldToTreatments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('treatments', function (Blueprint $table) {
            $table->renameColumn('created_by', 'patient_id');
            $table->date('start_time')->after('created_by')->nullable();
            $table->date('end_time')->after('start_time')->nullable();
            $table->date('start_break')->after('end_time')->nullable();
            $table->date('end_break')->after('start_break')->nullable();
            $table->integer('duration')->after('end_break')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('treatments', function (Blueprint $table) {
            //
        });
    }
}
