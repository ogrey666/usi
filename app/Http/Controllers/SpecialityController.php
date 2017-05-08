<?php

namespace App\Http\Controllers;

use App\Speciality;
use Illuminate\Http\Request;

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
    
    /*
     * Edit speciality
     * @param Request $request
     * @param number $seciality_id
     */
    public function edit(Request $request, $speciality_id) {
        $speciality = Speciality::find($speciality_id);
        if ($speciality == null) {
            return $this->showError(404);
        }
        
        $data = $request->json()->all();
        $speciality->fill($data);
        $speciality->save();
        return response()->json($speciality);
    }
}
