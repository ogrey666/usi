<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecialityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('SPECIALITY', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->decimal('price_per_appointment', 5,2 );
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
        Schema::drop('SPECIALITY');
    }
}
