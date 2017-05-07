<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', array('as' => 'home', 'uses' => 'HomeController@index'));

// Rejestracja resourceful route dla kontrolerów
Route::resource('doctor', 'DoctorController');

    //TODO: Trzeba przerobic CREATE i EDIT na przyjmowanie JSONa, bez widoku, IMHO - bo taki mial byc INPUT z specyfikacji CRUD
    //TODO: Trzeba przerobic CREATE i EDIT na przyjmowanie JSONa, bez widoku, IMHO - bo taki mial byc INPUT z specyfikacji CRUD
    //TODO: Trzeba przerobic CREATE i EDIT na przyjmowanie JSONa, bez widoku, IMHO - bo taki mial byc INPUT z specyfikacji CRUD
    //TODO: Trzeba przerobic CREATE i EDIT na przyjmowanie JSONa, bez widoku, IMHO - bo taki mial byc INPUT z specyfikacji CRUD
    //
//TODO: 1,2,7

//DONE: 3,4,5,8,9

// Akcje RESTful
// 1. CREATE_DOCTOR
Route::post('doctor/create', array('as' => 'doctor.create', 'uses' => 'DoctorController@create'));
// 2. EDIT_DOCTOR
Route::put('doctor/{doctor_id}/edit', array('as' => 'doctor.edit', 'uses' => 'DoctorController@edit'));
// 3. DELETE_DOCTOR
Route::delete('doctor/{doctor_id}/delete', array('as' => 'doctor.delete', 'uses' => 'DoctorController@remove'));
// 4. READ_DOCTOR
Route::get('doctor/{doctor_id}', array('as' => 'doctor.read', 'uses' => 'DoctorController@show'));
// 5. READ_DOCTOR_APPOINTMENTS
Route::get('doctor/{doctor_id}/appointment', array('as' => 'doctor.appointments.read', 'uses' => 'DoctorController@showAppointments'));
// 6. READ_DOCTOR_APPOINTMENT
Route::get('doctor/{doctor_id}/appointment/{appointment_id}', array('as' => 'doctor.appointment.read', 'uses' => 'DoctorController@showAppointment'));
// 7. READ_DOCTOR_APPOINTMENTS_BY_DATE
Route::post('doctor/{doctor_id}/appointment', array('as' => 'doctor.appointment.read.by.date', 'uses' => 'DoctorController@showAppointment'));
// 8. READ_DOCTORS
Route::get('doctor', array('as' => 'doctors.read', 'uses' => 'DoctorController@showAll'));
// 9. READ_DOCTORS_BY_SPECIALITY
Route::get('doctor/speciality/{speciality_id}', array('as' => 'doctors.speciality', 'uses' => 'DoctorController@showSpeciality'));