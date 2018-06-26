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
        //Obtiene los id de los integrantes del equipo y los guarda en un arreglo
        $arreglo = [];
        $arreglo = $r->input('miembros');
        //Separa los id
        $var = preg_split("','", $arreglo);
        //Convierte el arreglo en una coleccion
        $var2 = collect($var);

        $resultado = $var2->map(function($item,$key){
            return $item*1;
        });
        //Sube el equipo a la base de datos
        $equipo = new Equipos();
        $equipo->nombreequipo = $r->input('name');
        $equipo->save();
        //Obtiene ID del equipo recien registrado atravez del nombre
        $idequipo = Equipos::where('nombreequipo', $r->input('name'))->first();
        //Registra al lider del equipo en la tabla pivote
        $equipo->userLider()->attach($idequipo->id,["user_lider_id"=>Auth::user()->id,"user_id"=>Auth::user()->id]);
        //Registra a los integrantes del equipo
        foreach ($resultado as $key) {
            $equipo->userMiembro()->attach($idequipo->id,["user_id"=>$key,"user_lider_id"=>Auth::user()->id]);
        }

        return view('profile');

    }

    public function misEquipos()
    {
        //$var = Equipos::with('userMiembro');
       $usuario = Auth::user()->id;
       //$var2 = collect($var);
        $equipos = Equipos::whereHas('userMiembro', function($q) use ($usuario){
            $q->where('user_id',$usuario);
        })->get();
    
        /*$resultado = $equipos->map(function($item,$key){
            return $item*1;
        });*/
        dd($equipos);
        return view('equipos/listaequipos');
    }
}
