<?php

namespace App\Http\Controllers;

use App\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /*
     * Create appointment
     * @param Request $request
     */
    
    public function create(Request $request) {
        $data = $request->json()->all();
        $appointment = new Appointment();
        $appointment->fill($data);
        $appointment->save();
        return response()->json(['id' => $appointment->id]);
    }
    
    /*
     * Edit appointment
     * @param Request $request
     * @param number $appointment_id
     */
    public function edit(Request $request, $appointment_id) {
        $appointment = Appointment::find($appointment_id);
        
        if ($appointment == null) {
            return $this->showError(404);
        }
        
        $data = $request->json()->all();
        $appointment->fill($data);
        $appointment->save();
        return response()->json($appointment);
    }
    
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
