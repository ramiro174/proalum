<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Resultado extends Model
{
   protected  $primary_key="id";
   protected  $table="resultados";
   protected  $fillable=["nombre","numero"];
   
   
}
