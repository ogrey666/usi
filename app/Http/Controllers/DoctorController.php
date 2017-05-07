<?php

namespace App\Http\Controllers;

use App\Doctor;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /*
     * Create doctor
     * @param Request $request
     */
    
    public function create(Request $request) {
        $data = $request->json()->all();
        $doctor = new Doctor();
        $doctor->fill($data);
        $doctor->save();
        return response()->json(['id' => $doctor->id]);
    }
    
    /*
     * Edit doctor
     * @param Request $request
     * @param number $doctor_id
     */
    public function edit(Request $request, $doctor_id) {
        $doctor = Doctor::find($doctor_id);
        
        if ($doctor == null) {
            return $this->showError(404);
        }
        
        $data = $request->json()->all();
        $doctor->fill($data);
        $doctor->save();
        return response()->json($doctor);
    }

    /*
     * Show doctor
     * @param number $doctor_id
     */
    public function show($doctor_id) {
        $doctor = Doctor::find($doctor_id);
        return response()->json($doctor);
    }
    
    /*
     * Remove doctor
     * @param number $doctor_id
     */
    public function remove($doctor_id) {    
        Doctor::destroy($doctor_id);
        return response()->json(['id' => $doctor_id]);
    }
    
    /*
     * Show appointments for a doctor (multiple) - optionally by date (when provided)
     * @param Request $request
     * @param number $doctor_id
     */
    public function showAppointments(Request $request, $doctor_id) {
        if ($request->isMethod('get')) {
            return response()->json(Doctor::find($doctor_id)->appointmnts()->getResults());
        } elseif ($request->isMethod('post')) {
            // Pobranie wartosci daty z input JSONa jesli jest w Requescie
            $input_date = $request->json()->get("date");
            if ($input_date == null) {
                return $this->showError(400);
            }
            // Sprawdzenie, czy podana wartosc dla klucza jest w istocie data formatu YYYY-MM-DD
            // http://stackoverflow.com/a/13194398/2095534
            $appointment_date = \Date::createFromFormat("Y-m-d", $input_date);
            var_dump($appointment_date);
            var_dump($appointment_date !== false && !array_sum($appointment_date->getLastErrors()));
            
            
            var_dump($appointment_date);
            var_dump(strtotime($appointment_date));
            var_dump(date('Y-m-d',strtotime($appointment_date)));
            return;
        }
    }
    
//    /*
//     * Show appointments for a doctor (multiple) by date
//     * @param Request $request
//     */
//    public function showAppointmentsByDate(Request $request, $doctor_id) {
//        $appointment_date = $request->json()->all();
//        return;
//        //return response()->json(Doctor::where(['id', intval($doctor_id), '']))
//    }
    
    /*
     * Show appointment for a doctor (single)
     * @param number $doctor_id
     * @param number $appointment_id
     */
    public function showAppointment($doctor_id, $appointment_id) {
        // Wybranie pierwszego Property obiektu i wyjście z pętli
	$result = \App\Appointment::all()->where('DOCTOR_id', intval($doctor_id))->where('id', intval($appointment_id));
        $first_prop = [];
	foreach($result as $prop) {
	    $first_prop = $prop;
	    break; 
	 } 
        return response()->json($first_prop);
    }
    
    /*
     * Show all doctors
     */
    public function showAll() {
        return response()->json(Doctor::all());
    }
    
    /*
     * Show doctors by speciality
     * @param number $speciality_id
     */
    public function showSpeciality($speciality_id) {
        return response()->json(Doctor::all()->where('SPECIALITY_id', intval($speciality_id)));
    }
}
