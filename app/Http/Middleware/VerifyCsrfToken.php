<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
        // Wlaczona weryfikacja tokenu CSRF na wszystkich uslugach
//        'doctor/create',
//        'doctor/*/edit',
//        'doctor/*/delete', 
//        'doctor/*/appointment',
//	'patient/*/delete',
//	'appointment/*/delete',
//	'appointment/*/edit',
//        'appointment/create',
//	'patient/*/edit',
//        'patient/create',
//        'speciality/*/edit',
//	'patient/*/appointment'
    ];
}
