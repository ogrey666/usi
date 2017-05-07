<?php

namespace App\Http\Controllers;

use App\Doctor;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /*
     * Create doctor
     */

    public function create() {
        
        if (Request::isMethod('post')) {
	    $doctor = new Doctor;
	    if (Input::has('speciality_id')) {
		$doctor->speciality_id = Input::get('speciality_id');
	    }
	    if (Input::has('first_name')) {
		$doctor->first_name = Input::get('first_name');
	    }
	    if (Input::has('last_name')) {
		$doctor->last_name = Input::get('last_name');
	    }
	    if (Input::has('phone')) {
		$doctor->phone = Input::get('phone');
	    }
	    if (Input::has('gender')) {
		$doctor->gender = Input::get('gender');
	    }
	    if (Input::has('birthday')) {
		$doctor->birthday = Input::get('birthday');
	    }
	    if (Input::has('email')) {
		$doctor->email = Input::get('email');
	    }
	    if (Input::has('room')) {
		$doctor->room = Input::get('room');
	    }
	    $doctor->save();
            return response()->json(['id' => $doctor->id]);
        }
        return view('doctor-create');
    }
    
    /*
     * Edit doctor
     * @param number $doctor_id
     */
    public function edit($doctor_id) {
        $doctor = Doctor::find($doctor_id);
		
        if ($doctor == null) {
	    return $this->showError(404);
	}
	
        if (Request::isMethod('put')) {
            $is_changed = false;
            if (Input::has('speciality_id')) {
                $doctor->speciality_id = Input::get('speciaity_id'); 
                $is_changed ?: $is_changed = true;
            }
            if (Input::has('first_name')) {
                $doctor->first_name = Input::get('first_name'); 
                $is_changed ?: $is_changed = true;
            }
            if (Input::has('last_name')) {
                $doctor->last_name = Input::get('last_name'); 
                $is_changed ?: $is_changed = true;
            }
            if (Input::has('phone')) {
                $doctor->phone = Input::get('phone'); 
                $is_changed ?: $is_changed = true;
            }
            if (Input::has('gender')) {
                $doctor->gender = Input::get('gender'); 
                $is_changed ?: $is_changed = true;
            }
            if (Input::has('birthday')) {
                $doctor->birthday = Input::get('birthday'); 
                $is_changed ?: $is_changed = true;
            }
            if (Input::has('email')) {
                $doctor->email = Input::get('email'); 
                $is_changed ?: $is_changed = true;
            }
            if (Input::has('room')) {
                $doctor->room = Input::get('room'); 
                $is_changed ?: $is_changed = true;
            }
            
            (!$is_changed) ?: $doctor->save();
            return response()->json($doctor);
        }
        return view('doctor-edit', ['doctor' => $doctor, 'doctor_id' => $doctor_id]);
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
     * Show appointments for a doctor (multiple)
     * @param number $doctor_id
     */
    public function showAppointments($doctor_id) {
        return response()->json(Doctor::find($doctor_id)->appointmnts()->getResults());
    }
    
    /*
     * Show appointment for a doctor (single)
     * @param number $doctor_id
     * @param number $appointment_id
     */
    public function showAppointment($doctor_id, $appointment_id) {
        // Wybranie pierwszego Property obiektu i wyjście z pętli
	$result = \App\Appointment::all()->where('DOCTOR_id', intval($doctor_id))->where('id', intval($appointment_id));
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
