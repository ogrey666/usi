<?php

namespace App\Http\Controllers;

use App\Speciality;

class SpecialityController extends Controller
{
    /*
     * Show speciality
     * @param number $speciality_id
     */
    public function show($speciality_id) {
        $speciality = Speciality::find($speciality_id);
        return response()->json($speciality);
    }

    /*
     * Show all specialities
     */
    public function showAll() {
        return response()->json(Speciality::all());
    }
}
