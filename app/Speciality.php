<?php
namespace App;
use Illuminate\Database\Eloquent\Model;


class Speciality extends Model{
    protected $table = "SPECIALITY";
    public $timestamps = false;
    
    public function doctors(){
        return $this->hasMany('App\Doctor', 'SPECIALITY_id');
    }
}
