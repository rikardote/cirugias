<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Surgery extends Model
{
    protected $fillable = ['fecha', 'sala', 'paciente_id', 'medico_id', 'anestesiologo_id', 'cirugia_id', 'horario', 
            'ubicacion', 'cirugia_realizada', 'tiempo_qx', 'hora_inicio', 'hora_final', 'observaciones', 'suspendida',
            'reprogramada', 'urgencias', 'fecha_repro', 'cerrada'];

	protected $table = 'surgerys';
    
    public function paciente()
    {
        return $this->belongsTo('App\Paciente');
    }
    public function medico()
    {
        return $this->belongsTo('App\Medico');
    }
    public function anestesiologo()
    {
        return $this->belongsTo('App\Anestesiologo');
    }
    public function cirugia()
    {
        return $this->belongsTo('App\Cirugia');
    }
}
