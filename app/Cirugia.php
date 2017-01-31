<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cirugia extends Model
{
    protected $fillable = ['name'];

    public function setnameAttribute($value)
    {
        $this->attributes['name'] = strtoupper($value);
    }
    
}
