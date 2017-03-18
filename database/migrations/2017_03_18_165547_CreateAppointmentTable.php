<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('APPOINTMENT', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('DOCTOR_id')->unsigned();
            $table->foreign('DOCTOR_id')->references('id')->on('DOCTOR');
            $table->integer('PATIENT_id')->unsigned();
            $table->foreign('PATIENT_id')->references('id')->on('PATIENT');
            $table->date('date');
            $table->time('duration');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('APPOINTMENT');
    }
}
