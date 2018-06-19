<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table='users';
    protected $primaryKey='id';
    protected $fillable=["name","email","password"];

    public function equipo()
    {
    	return $this->belongsToMany('App\models\Equipos',"usuario_equipo")
    	->withPivot('equipos_id');
    }

    public function rol()
    {
    	
    }
}
