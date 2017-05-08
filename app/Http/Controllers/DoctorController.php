<?php

namespace App\Http\Controllers;

use App\Doctor;
use Illuminate\Http\Request;
use DB;
use App\Http\Traits\ValidateDate;

class DoctorController extends Controller
{
    use ValidateDate;
    
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
            $input_dt = $request->json()->get("date");
            if ($input_dt == null) {
                return $this->showError(400);
            }
            // Sprawdzenie, czy podana wartosc dla klucza jest w istocie data formatu YYYY-MM-DD
            $appt_dt = $this->validateDate($input_dt);
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
                    ->where('DOCTOR_id', '=', intval($doctor_id))
                    ->whereBetween('date', array($appt_dttm, $appt_dttm_next))
                    ->get();
            return response()->json($result);
        }
    }
    
    /*
     * Show appointment for a doctor (single)
     * @param number $doctor_id
     * @param number $appointment_id
     */
    public function showAppointment($doctor_id, $appointment_id) {
	$result = \App\Appointment::where([
            ['DOCTOR_id', intval($doctor_id)],
            ['id', intval($appointment_id)]
            ])->get();
        return response()->json($result[0]);
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
        return response()->json(Doctor::where('SPECIALITY_id', intval($speciality_id))->get());
    }
}
