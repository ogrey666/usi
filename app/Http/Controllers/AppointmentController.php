<?php

namespace App\Http\Controllers;

use App\Appointment;

class AppointmentController extends Controller
{
    /*
     * Remove appointment
     * @param number $appointment_id
     */
    public function remove($appointment_id) {    
        Appointment::destroy($appointment_id);
        return response()->json(['id' => $appointment_id]);
    }
    
    /*
     * Show appointment
     * @param number $appointment_id
     */
    public function show($appointment_id) {
        $appointment = Appointment::find($appointment_id);
        return response()->json($appointment);
    }
    
    /*
     * Show all appointments
     */
    public function showAll() {
        return response()->json(Appointment::all());
    }
}
