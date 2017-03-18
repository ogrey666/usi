<?php
namespace App;
use Illuminate\Database\Eloquent\Model;


class Appointment extends Model{
    protected $table = "APPOINTMENT";
    public $timestamps = false;
    
    public function doctor(){
        return $this->belongsTo('App\Doctor', 'DOCTOR_id');
    }
    
    public function patient(){
        return $this->belongsTo('App\Patient', 'PATIENT_id');
    }
    

    
    
}
