<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'type', 'medico_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function especialidades()
    {
        return $this->belongsToMany('App\Especialidad')->withTimestamps();
    }

    public function admin() 
    {
        return $this->type === 'admin';
    }
    public function setnameAttribute($value)
    {
        $this->attributes['name'] = strtoupper($value);
    }
    public function medico()
    {
        return $this->belongsTo('App\Medico', 'medico_id');
    }
}
