<?php

namespace App\Http\Controllers;

use App\Patient;
use Illuminate\Http\Request;
use App\Appointment;
use DB;

class PatientController extends Controller {
    /*
     * Create patient
     * @param Request $request
     */
    
    public function create(Request $request) {
        $data = $request->json()->all();
        $patient = new Patient();
        $patient->fill($data);
        $patient->save();
        return response()->json(['id' => $patient->id]);
    }
    
    /*
     * Edit patient
     * @param Request $request
     * @param number $patient_id
     */
    public function edit(Request $request, $patient_id) {
        $patient = Patient::find($patient_id);
        
        if ($patient == null) {
            return $this->showError(404);
        }
        
        $data = $request->json()->all();
        $patient->fill($data);
        $patient->save();
        return response()->json($patient);
    }
    
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
	$result = Appointment::all()->where('DOCTOR_id', intval($patient_id))->where('id', intval($appointment_id));
	$first_prop = array();
	foreach($result as $prop) {
	    $first_prop = $prop;
	    break; 
	 } 
        return response()->json($first_prop);
	
    }
    
    /*
     * Tu jeszcze dolozyc 16
     * Show doctors by speciality
     * @param number $speciality_id
     */
    public function showAppointmentsByCondition(Request $request, $patient_id) {
	if ($request->json()->get("speciality_id")) {
            $result = DB::table('APPOINTMENT')
		    ->leftJoin('DOCTOR', 'DOCTOR.id', '=', 'APPOINTMENT.DOCTOR_id')
                    ->where('PATIENT_id', '=', intval($patient_id))
		    ->where('DOCTOR.SPECIALITY_id', '=', intval($request->json()->get("speciality_id")))
                    ->get();

	    return response()->json($result);
	}
	// drugi if dla 16 dla daty
    }
}
