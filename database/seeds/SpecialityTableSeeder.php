<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class SpecialityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('speciality')->insert([
            [
                "id" => 1,
                "name" => "Paediatrics",
                "price_per_appointment" => 25.00
            ],
            [
                "id" => 2,
                "name" => "Neurology",
                "price_per_appointment" => 42.00
            ],
            [
                "id" => 3,
                "name" => "Surgery",
                "price_per_appointment" => 78.00
            ],
        ]);
        
    }
}
