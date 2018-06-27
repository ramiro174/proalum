<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Auth;
class Equipos extends Model
{
    protected $table='equipos';
    protected $primaryKey='id';
    protected $fillable=["nombreequipo"];

    public function userLider(){
    	return $this->belongsToMany('App\models\User',"equipo_user","equipo_id","user_lider_id")
    	->withPivot('user_id_lider')->withTimestamps();
    }

    public function userMiembro(){
    	return $this->belongsToMany('App\models\User',"equipo_user","equipo_id","user_id")
    	->withPivot('user_id')->withTimestamps();
    }
    public function proyecto()
    {
        return $this->hasMany('App\models\Proyectos','equipos_id');
    }

    public static function scopeMisequipos()
    {
        $usuario = Auth::user()->id;
        $equipos = Equipos::whereHas('userMiembro', function($q) use ($usuario){
            $q->where('user_id',$usuario);
        })->get();
        return $equipos;
    }



}
