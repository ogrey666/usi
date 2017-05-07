<?php
namespace App;
use Illuminate\Database\Eloquent\Model;


class Patient extends Model{
    protected $table = "PATIENT";
    public $timestamps = false;
    protected $guarded = [];
    
    public function appointments(){
        return $this->hasMany('App\Appointment', 'PATIENT_id');
    }
}
