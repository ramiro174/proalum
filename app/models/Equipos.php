<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Equipos extends Model
{
    protected $table='equipos';
    protected $primaryKey='id';
    protected $fillable=["nombreequipo"];

    public function userLider(){
    	return $this->belongsToMany('App\models\User',"usuario_equipo")
    	->withPivot('user_id_lider');
    }

    public function userMiembro(){
    	return $this->belongsToMany('App\models\User',"usuario_equipo")
    	->withPivot('user_id_miembro');
    }
    public function proyecto()
    {
        return $this->hasMany('App\models\Proyectos','equipos_id');
    }


}
