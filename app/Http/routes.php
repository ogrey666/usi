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
Route::resource('patient', 'PatientController');
Route::resource('appointment', 'AppointmentController');
Route::resource('speciality', 'SpecialityController');

// Akcje RESTful
// 1. CREATE_DOCTOR
Route::post('doctor/create', array('as' => 'doctor.create', 'uses' => 'DoctorController@create'));
// 2. EDIT_DOCTOR
Route::match(['put', 'post'], 'doctor/{doctor_id}/edit', array('as' => 'doctor.edit', 'uses' => 'DoctorController@edit'));
// 3. DELETE_DOCTOR (GET, DELETE)
Route::match(['get', 'delete'], 'doctor/{doctor_id}/delete', array('as' => 'doctor.delete', 'uses' => 'DoctorController@remove'));
// 4. READ_DOCTOR
Route::get('doctor/{doctor_id}', array('as' => 'doctor.read', 'uses' => 'DoctorController@show'));
// 5. READ_DOCTOR_APPOINTMENTS
Route::get('doctor/{doctor_id}/appointment', array('as' => 'doctor.appointments.read', 'uses' => 'DoctorController@showAppointments'));
// 6. READ_DOCTOR_APPOINTMENT
Route::get('doctor/{doctor_id}/appointment/{appointment_id}', array('as' => 'doctor.appointment.read', 'uses' => 'DoctorController@showAppointment'));
// 7. READ_DOCTOR_APPOINTMENTS_BY_DATE
Route::post('doctor/{doctor_id}/appointment', array('as' => 'doctor.appointment.read.by.date', 'uses' => 'DoctorController@showAppointments'));
// 8. READ_DOCTORS
Route::get('doctor', array('as' => 'doctors.read', 'uses' => 'DoctorController@showAll'));
// 9. READ_DOCTORS_BY_SPECIALITY
Route::get('doctor/speciality/{speciality_id}', array('as' => 'doctors.speciality', 'uses' => 'DoctorController@showSpeciality'));
// 12. DELETE_PATIENT (GET, DELETE)
Route::match(['get', 'delete'], 'patient/{patient_id}/delete', array('as' => 'patient.delete', 'uses' => 'PatientController@remove'));
// 13. READ_PATIENT
Route::get('patient/{patient_id}', array('as' => 'patient.read', 'uses' => 'PatientController@show'));
// 14. READ_PATIENT_APPOINTMENTS
Route::get('patient/{patient_id}/appointment', array('as' => 'patient.appointments.read', 'uses' => 'PatientController@showAppointments'));
// 15. READ_PATIENT_APPOINTMENT
Route::get('patient/{patient_id}/appointment/{appointment_id}', array('as' => 'patient.appointment.read', 'uses' => 'PatientController@showAppointment'));
// 18. READ_PATIENTS
Route::get('patient', array('as' => 'patient.read', 'uses' => 'PatientController@showAll'));
// 19. CREATE_APPOINTMENT
Route::post('appointment/create', array('as' => 'appointment.create', 'uses' => 'AppointmentController@create'));
// 20. EDIT_APPOINTMENT
Route::match(['put', 'post'], 'appointment/{appointment_id}/edit', array('as' => 'doctor.edit', 'uses' => 'AppointmentController@edit'));
// 21. DELETE_APPOINTMENT (GET, DELETE)
Route::match(['get', 'delete'], 'appointment/{appointment_id}/delete', array('as' => 'appointment.delete', 'uses' => 'AppointmentController@remove'));
// 22. READ_APPOINTMENT
Route::get('appointment/{appointment_id}', array('as' => 'appointment.read', 'uses' => 'AppointmentController@show'));
// 23. READ_APPOINTMENTS
Route::get('appointment', array('as' => 'appointment.read', 'uses' => 'AppointmentController@showAll'));
// 25. READ_SPECIALITY
Route::get('speciality/{speciality_id}', array('as' => 'speciality.read', 'uses' => 'SpecialityController@show'));
// 26. READ_SPECIALITIES
Route::get('speciality', array('as' => 'speciality.read', 'uses' => 'SpecialityController@showAll'));
