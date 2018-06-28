<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Proyectos extends Model
{
    //protected $table='equipos';
    protected $primaryKey='id';
    protected $fillable=["nombre_proyecto","equipos_id","vinculo,","descripcion","imagen"];

    public function equipos(){
    	return $this->belongsTo('App\models\Equipos');
    }
    public function scopeMisproyectos($query)
        {
            $usuario = Auth::user()->id;
            //return $query->with('equipos.userMiembro')->get();

            return $query->whereHas('equipos.userMiembro', function ($q) use ($usuario) {
                $q->where('user_id', $usuario);
            })->get();

        }
}
