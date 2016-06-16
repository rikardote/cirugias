<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Medico extends Model 
{

     protected $table = 'medicos';

     protected $fillable = ['nombres', 'apellido_pat', 'apellido_mat'];



    
    public function setnombresAttribute($value)
    {
        $this->attributes['nombres'] = strtoupper($value);
    }
    public function setapellidopatAttribute($value)
    {
        $this->attributes['apellido_pat'] = strtoupper($value);
    }
    public function setapellidomatAttribute($value)
    {
        $this->attributes['apellido_mat'] = strtoupper($value);
    }
  
    public function getFullnameAttribute() {
        return $this->apellido_pat . ' ' . $this->apellido_mat. ' ' . $this->nombres;
    
    }

}
