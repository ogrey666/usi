<?php

use Illuminate\Database\Seeder;
use App\Appointment;
use App\Doctor;
use App\Patient;

class AppointmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $appointment = new Appointment();
        $appointment->doctor()->associate(Doctor::find(1));
        $appointment->patient()->associate(Patient::find(1));
        $appointment->date = "2016-05-09 09:00:00";
        $appointment->duration = "00:25:00";
        $appointment->save();
        
        $appointment = new Appointment();
        $appointment->doctor()->associate(Doctor::find(2));
        $appointment->patient()->associate(Patient::find(2));
        $appointment->date = "2016-05-09 09:00:00";
        $appointment->duration = "00:15:00";
        $appointment->save();
        
        $appointment = new Appointment();
        $appointment->doctor()->associate(Doctor::find(3));
        $appointment->patient()->associate(Patient::find(3));
        $appointment->date = "2016-05-09 09:00:00";
        $appointment->duration = "00:30:00";
        $appointment->save();
        
        $appointment = new Appointment();
        $appointment->doctor()->associate(Doctor::find(1));
        $appointment->patient()->associate(Patient::find(2));
        $appointment->date = "2016-05-10 11:00:00";
        $appointment->duration = "00:20:00";
        $appointment->save();
        
        $appointment = new Appointment();
        $appointment->doctor()->associate(Doctor::find(2));
        $appointment->patient()->associate(Patient::find(3));
        $appointment->date = "2016-05-10 11:00:00";
        $appointment->duration = "00:25:00";
        $appointment->save();
        
        $appointment = new Appointment();
        $appointment->doctor()->associate(Doctor::find(3));
        $appointment->patient()->associate(Patient::find(1));
        $appointment->date = "2016-05-10 11:00:00";
        $appointment->duration = "00:45:00";
        $appointment->save();
        
        $appointment = new Appointment();
        $appointment->doctor()->associate(Doctor::find(1));
        $appointment->patient()->associate(Patient::find(3));
        $appointment->date = "2016-05-11 10:00:00";
        $appointment->duration = "00:30:00";
        $appointment->save();
        
        $appointment = new Appointment();
        $appointment->doctor()->associate(Doctor::find(2));
        $appointment->patient()->associate(Patient::find(1));
        $appointment->date = "2016-05-11 10:00:00";
        $appointment->duration = "00:20:00";
        $appointment->save();
        
        $appointment = new Appointment();
        $appointment->doctor()->associate(Doctor::find(3));
        $appointment->patient()->associate(Patient::find(2));
        $appointment->date = "2016-05-11 10:00:00";
        $appointment->duration = "00:35:00";
        $appointment->save();
        
    }
}
