<?php

namespace App\Http\Controllers;

use Request;

use App\Http\Requests;
use App\Doctor;
use Illuminate\Support\Facades\Input;

class DoctorController extends Controller
{
    public function create(Request $request){
	if (Request::isMethod('post'))
	{
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
	}
        return view("doctor-create");
    }
}
