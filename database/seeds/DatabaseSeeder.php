<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(SpecialityTableSeeder::class);
        $this->call(PatientTableSeeder::class);
        $this->call(DoctorTableSeeder::class);
        $this->call(AppointmentTableSeeder::class);      
        
    }
}
