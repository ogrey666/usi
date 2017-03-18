<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('DOCTOR', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone');
            $table->boolean('gender');
            $table->date('birthday');
            $table->string('email');
            $table->integer('SPECIALITY_id')->unsigned();
            $table->foreign('SPECIALITY_id')->references('id')->on('SPECIALITY');
            $table->string('room');
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
        Schema::drop('DOCTOR');
    }
}
