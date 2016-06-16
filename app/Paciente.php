<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $connection = 'mysql-pacientes';
    protected $table = 'pacientes';

          
    protected $fillable = ['rfc', 'nombres', 'apellido_pat', 'apellido_mat', 'tipo_id', 'gender', 'phone', 'phone_casa', 'address', 'colonia_id'];

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
    public function setrfcAttribute($value)
    {
        $this->attributes['rfc'] = strtoupper($value);
    }
    public function setaddressAttribute($value)
    {
        $this->attributes['address'] = strtoupper($value);
    }
    public function getFullnameAttribute() {
        return $this->apellido_pat . ' ' . $this->apellido_mat. ' ' . $this->nombres;
    
    }
   
    public function tipo()
    {
        return $this->belongsTo('App\Tipo');
    }
    public function colonia()
    {
        return $this->belongsTo('App\Colonia');
    }
    
}
