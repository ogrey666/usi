<?php

namespace App\Http\Traits;

trait ValidateDate {
    
    /*
     * Validate date format YYYY-MM-DD - http://stackoverflow.com/a/13194398/2095534
     * return null -> invalid date
     * return $dtObj -> valid date
     */
    protected function validateDate($dt) {
        $dtObj = \DateTime::createFromFormat("Y-m-d", $dt);
        if (!($dtObj !== false && !array_sum($dtObj->getLastErrors()))) {
            return null;
        } else {
            return $dtObj;
        }
    }
}