<?php
namespace App;
use Illuminate\Database\Eloquent\Model;


class Doctor extends Model{
    protected $table = "DOCTOR";
    public $timestamps = false;
    
    public function speciality(){
        return $this->belongsTo('App\Speciality', 'SPECIALITY_id');
    }
    
    public function appointmnts(){
        return $this->hasMany('App\Appointment', 'DOCTOR_id');
    }
}
