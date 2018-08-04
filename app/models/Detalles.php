<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Detalles extends Model
{
    protected $table = 'Detalles';
	protected $primaryKey = 'id';
	protected $fillable = ["imagen","descripcion"];

	public function proyectos(){
		return $this->belongsTo('App\models\Proyectos');
	}
}
