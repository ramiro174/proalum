<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\models\User;
use App\models\Equipos;

class EquipoController extends Controller
{
     public function registrarEquipo(Request $r){
        $arreglo = [];
        $arreglo = $r->input('miembros');
        $var = preg_split("','", $arreglo);
        $var2 = collect($var);
        $resultado = $var2->map(function($item,$key){
            return $item*1;
        });
        $equipo = new Equipos();
        $equipo->nombreequipo = $r->input('name');
        $equipo->save();
        $idequipo = Equipos::where('nombreequipo', $r->input('name'))->first();
        //dd($idequipo->id);
        
        $equipo->userLider()->attach([1,Auth::user()->id]);
    }
}
