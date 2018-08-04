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
        //Simplifica la coleccion
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
    $r->session()->flash('mensaje','Equipo registrado exitosamente!');
    return view('profile');

}
/*-----------CONTROLADORES DE MODALS EN VISTA PERFILEQUIPO----------------------*/
public function modalagregar(Request $r)
{
       //Obtiene los id de los integrantes del equipo y los guarda en un arreglo
    $arreglo = [];
    $arreglo = $r->input('miembros');
        //Separa los id
    $var = preg_split("','", $arreglo);
        //Convierte el arreglo en una coleccion
    $var2 = collect($var);
        //Simplifica la coleccion
    $resultado = $var2->map(function($item,$key){
        return $item*1;
    });
        $equipo = new Equipos();
        $idequipo = $r->input('idequipo');
        
        //Registra a los integrantes del equipo

    foreach ($resultado as $key) {
        $equipo->userMiembro()->attach([["equipo_id"=>$idequipo,"user_id"=>$key,
            "user_lider_id"=>$r->input('lider')]]);
    }
    $r->session()->flash('mensaje','Equipo registrado exitosamente!');
    return "registro exitoso";
}

public function modaleditar(Request $r){
	$equipo = Equipos::where('id',$r->input('idequipo'))->first();
	if ($r->input('nombre') != null) {
		$equipo->nombreequipo = $r->input('nombre');
	}
	if ($r->input('mensaje') != null) {
		$equipo->mensaje = $r->input('mensaje');
	}
	$equipo->save();
	$r->session()->flash('mensaje','¡Cambios registrados exitosamente!');
	$mensaje = "¡Cambios registrados exitosamente!";
	return $mensaje;
}
public function modalborrar(Request $r)
{
	//$alumno = Equipos::with('userMiembro')->where('user_id',$r->input('idalumno'))->where('equipo_id',$r->input('idequipo'));
    
	//$alumno->userMiembro()->detach($r->input('idalumno'));
    $alumno = User::find($r->input('idalumno'));
    $alumno->equipoMiembro()->detach($r->input('idequipo'));
    $mensaje = "¡Cambios registrados exitosamente!";

    return $mensaje;
}
public function modaleditartitulo(Request $r)
{
   //$alumno = Equipos::with('userMiembro')->where('id',$r->input('idequipo'))->first();
    $alumno = User::find($r->input('idalumno'));
    $arreglo = ['equipo_id' => $r->input('idequipo'),'user_lider_id' => $r->input('lider'), 'user_id' => $r->input('idalumno'), 'titulo' => $r->input('titulo') ];

    $alumno->equipoMiembro()->updateExistingPivot($r->input('idequipo'),$arreglo);
    return "Titulo editado.";
    
    
}

public function misEquipos()
{

    $equipos = Equipos::misequipos();
    $lider = Equipos::misequiposlider();

    
   $var = $lider;
   
    if (count($var) > 0) {
       $lider = $lider[0]->userLider[0]->id; 

    }
    else
    {
        $lider = 0;
    }

    return view('equipos/listaequipos')->with(compact('equipos','lider'));
}
public function misEquiposid($obj)
{

    $equipos = Equipos::misequiposid($obj);

    return view('equipos/listaequiposalumno')->with(compact('equipos'));
}

public function buscarequipo($obj)
{
    $miembros = Equipos::with('userMiembro')->where('id',$obj)->first();
    $lider = Equipos::with('userLider')->where('id',$obj)->first();

    $lider = $lider->userLider[0]->pivot->user_lider_id;
  
        $miembros = $miembros->userMiembro;

      
       // return $miembros[0]->name;
    $equipo = Equipos::where('id',$obj)->first();
    $idequipo = $equipo->id;
    

    return view('perfilequipo')->with(compact('equipo','miembros','lider','idequipo'));
}
public function vistaPerfilequipo()
{       

    return view('perfilequipo');
}
}
