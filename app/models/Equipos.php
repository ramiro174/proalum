<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Equipos extends Model
{
	protected $table = 'equipos';
	protected $primaryKey = 'id';
	protected $fillable = ["nombreequipo"];


	public function userLider()
	{
		return $this->belongsToMany('App\models\User', "equipo_user", "equipo_id", "user_lider_id")
		->withPivot('user_lider_id')->withTimestamps();
	}
	public function userMiembro()
	{
		return $this->belongsToMany('App\models\User', "equipo_user", "equipo_id", "user_id")
		->withPivot('user_id')->withTimestamps();
	}
	public function proyecto()
	{
		return $this->hasMany('App\models\Proyectos', 'equipos_id');
	}
	public function scopeMisequipos($query)
	{
		$usuario = Auth::user()->id;
		return $query->whereHas('userMiembro', function ($q) use ($usuario) {
			$q->where('user_id', $usuario);
		})->get()->load("userMiembro");
	}
	public function scopeMisequiposid($query,$id)
	{
		$usuario = $id;
		return $query->whereHas('userMiembro', function ($q) use ($usuario) {
			$q->where('user_id', $usuario);
		})->get()->load("userMiembro");
	}

	
	public function scopeEquiposusuarios($query,$id)
	{
		return $query->whereHas('userMiembro', function ($q) use ($id) {
			$q->where('equipo_id', $id);
		})->get()->load("userMiembro");
	}
	





}
