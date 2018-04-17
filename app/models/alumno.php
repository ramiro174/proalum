<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class alumno extends Model
{
   protected  $primary_key="id";
   protected  $table="alumnos";
   protected  $fillable=["nombre","telefono"];
    public $timestamps = false;
   
}
