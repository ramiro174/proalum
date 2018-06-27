<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Proyectos extends Model
{
    //protected $table='equipos';
    protected $primaryKey='id';
    protected $fillable=["nombre_proyecto","equipos_id","vinculo,","descripcion","imagen"];

    public function equipos(){
    	return $this->belongsTo('App\models\Equipos');
    }
}
