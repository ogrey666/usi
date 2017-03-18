<?php

use Illuminate\Database\Seeder;
use App\Doctor;
use App\Speciality;
class DoctorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $doctor = new Doctor();
        $doctor->first_name = "John";
        $doctor->last_name = "Doe";
        $doctor->phone = "543321221";
        $doctor->gender = 0;
        $doctor->birthday = "1984-02-07";
        $doctor->email = "johndoe@clinic.com";
        $doctor->speciality()->associate(Speciality::find(1));
        $doctor->room = "2";
        $doctor->save();
        
                
        $doctor = new Doctor();
        $doctor->first_name = "Anna";
        $doctor->last_name = "Doe";
        $doctor->phone = "653234275";
        $doctor->gender = 1;
        $doctor->birthday = "1986-05-16";
        $doctor->email = "annadoe@clinic.com";
        $doctor->speciality()->associate(Speciality::find(2));
        $doctor->room = "4";
        $doctor->save();
        
        
        $doctor = new Doctor();
        $doctor->first_name = "Mike";
        $doctor->last_name = "Doe";
        $doctor->phone = "342534834";
        $doctor->gender = 0;
        $doctor->birthday = "1987-11-21";
        $doctor->email = "mikedoe@clinic.com";
        $doctor->speciality()->associate(Speciality::find(3));
        $doctor->room = "1";
        $doctor->save();
        
    }
}
