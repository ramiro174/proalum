<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Proyectos extends Model
{
    //protected $table='equipos';
	protected $primaryKey='id';
	protected $fillable=["nombre_proyecto","equipos_id","vinculo,","descripcion","imagen","votos"];

	public function userVotos()
	{
		return $this->belongsToMany('App\models\User', "proyectos_has_users", "proyectos_id", "users_id")
		->withPivot('users_id')->withTimestamps();
	}

	public function equipos(){
		return $this->belongsTo('App\models\Equipos');
	}
	public function detalles()
	{
		return $this->hasMany('App\models\Detalles', 'proyectos_id');
	}
	public function scopeMisproyectos($query)
	{
		$usuario = Auth::user()->id;
            //return $query->with('equipos.userMiembro')->get();

		return $query->whereHas('equipos.userMiembro', function ($q) use ($usuario) {
			$q->where('user_id', $usuario);
		})->get();

	}
	public function scopeProyectosAlumno($query,$id)
	{
		$usuario = $id;
            //return $query->with('equipos.userMiembro')->get();

		return $query->whereHas('equipos.userMiembro', function ($q) use ($usuario) {
			$q->where('user_id', $usuario);
		})->get();
	}

	public function scopeVotosAlumno($query,$idproyecto)
	{
		$usuario = Auth::user()->id;
		$id = $idproyecto;
		return $query->whereHas('userVotos', function ($q) use ($usuario,$id) {
			$q->where('users_id', $usuario)->where('proyectos_id',$id);
		})->get()->load("userVotos");
	}
	
}
