<?php

use Illuminate\Database\Seeder;

class PatientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('patient')->insert([
            [
                "id" => 1,
                "first_name" => "Alice",
                "last_name" => "Moon",
                "phone" => "456346753",
                "gender" => 1,
                "birthday" => "1989-01-27",
                "email" => "alicemoon@patient.com"
            ],
            [
                "id" => 2,
                "first_name" => "Caroline",
                "last_name" => "Grest",
                "phone" => "662676556",
                "gender" => 1,
                "birthday" => "1978-09-12",
                "email" => "carolinegrest@patient.com"
            ],
            [
                "id" => 3,
                "first_name" => "Thomas",
                "last_name" => "Awdry",
                "phone" => "983212412",
                "gender" => 0,
                "birthday" => "1964-11-17",
                "email" => "thomasawdry@patient.com"
            ]
        ]);
    }
}
