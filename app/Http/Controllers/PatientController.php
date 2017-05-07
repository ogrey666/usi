<?php

namespace App\Http\Controllers;

use App\Patient;

class PatientController extends Controller {
    /*
     * Remove patient
     * @param number $patient_id
     */
    public function remove($patient_id) {    
        Patient::destroy($patient_id);
        return response()->json(['id' => $patient_id]);
    }
    
    /*
     * Show patient
     * @param number $patient_id
     */
    public function show($patient_id) {
        $patient = Patient::find($patient_id);
        return response()->json($patient);
    }
    
    /*
     * Show all patients
     */
    public function showAll() {
        return response()->json(Patient::all());
    }
    
    /*
     * Show appointments for a doctor (multiple)
     * @param number $doctor_id
     */
    public function showAppointments($patient_id) {
        return response()->json(Patient::find($patient_id)->appointments()->getResults());
    }
    
    /*
     * Show appointment for a doctor (single)
     * @param number $doctor_id
     * @param number $appointment_id
     */
    public function showAppointment($patient_id, $appointment_id) {
        // Wybranie pierwszego Property obiektu i wyjście z pętli
	$result = \App\Appointment::all()->where('DOCTOR_id', intval($patient_id))->where('id', intval($appointment_id));
	$first_prop = array();
	foreach($result as $prop) {
	    $first_prop = $prop;
	    break; 
	 } 
        return response()->json($first_prop);
	
    }
}
