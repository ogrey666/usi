<?php

namespace App\Http\Controllers;

use App\Patient;
use Illuminate\Http\Request;
use App\Appointment;
use DB;
use App\Http\Traits\ValidateDate;

class PatientController extends Controller 
{
    use ValidateDate;
    
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
     * Show doctors by condition (speciality / date)
     * @param number $patient_id
     */
    public function showAppointmentsByCondition(Request $request, $patient_id) {
        
        // Sprawdz, czy podany JSON z Requesta zawiera inne klucze niz zbior $valid_keys
        // lub w przypadku gdy zawiera tylko te, to maksymalnie 1
        $input_keys = $request->json()->keys();
        $valid_keys = array('speciality_id','date');
        $diff_keys = array_diff($input_keys,$valid_keys);
        if ($diff_keys != array()
                || ($diff_keys == array() && count($input_keys) > 1)) {
            return $this->showError(400);
        }
        
	if ($request->json()->get("speciality_id")) {
            $result = DB::table('APPOINTMENT')
		    ->leftJoin('DOCTOR', 'DOCTOR.id', '=', 'APPOINTMENT.DOCTOR_id')
                    ->where('PATIENT_id', '=', intval($patient_id))
		    ->where('DOCTOR.SPECIALITY_id', '=', intval($request->json()->get("speciality_id")))
                    ->select('APPOINTMENT.*')
                    ->get();

	    return response()->json($result);
	}
	
        if ($request->json()->get("date")) {
            // Sprawdzenie, czy podana wartosc dla klucza jest w istocie data formatu YYYY-MM-DD
            $appt_dt = $this->validateDate($request->json()->get("date"));
            if ($appt_dt == null) {
                return $this->showError(400);
            }
            // Zmiana czasu w dacie na 00:00:00 (DateTime dodaje obecny)
            $appt_dttm = $appt_dt->setTime(0, 0);
            // Data szukana +1 dzien dla budowy kryteriow zapytania (klonowanie obiektu)
            $appt_dttm_next = clone $appt_dttm;
            $appt_dttm_next->add(new \DateInterval('P1D'));
            // Zapytanie do bazy - query builder (ograniczenia ORM wzgledem komparatorow)
            $result = DB::table('APPOINTMENT')
                    ->where('PATIENT_id', '=', intval($patient_id))
                    ->whereBetween('date', array($appt_dttm, $appt_dttm_next))
                    ->get();
            return response()->json($result);
        }
        
        return $this->showError(400);
    }
}
