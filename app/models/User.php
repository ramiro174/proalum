<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table='users';
    protected $primaryKey='id';
    protected $fillable=["name","email","password","imagen"];

    public function equipoMiembro()
    {
    	return $this->belongsToMany('App\models\Equipos',"equipo_user","user_id","equipo_id")
    	->withPivot('equipos_id')->withTimestamps();
    }
    public function equipoLider()
    {
        return $this->belongsToMany('App\models\Equipos',"equipo_user","user_lider_id","equipo_id")
        ->withPivot('equipos_id')->withTimestamps();
    }

    public function rol()
    {
    	
    }
}
