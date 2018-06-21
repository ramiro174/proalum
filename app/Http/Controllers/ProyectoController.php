<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Equipos;
use App\models\Proyectos;

class ProyectoController extends Controller
{	

	public function obtenerEquipos()
	{
		$equipos = Equipos::all();
		
		return view('registrarproyecto')->with(compact('equipos'));
	}

    public function registrarProyecto(Request $r)
    {
    	$obj = new Proyectos();

    	$obj->nombre_proyecto = $r->input('name');
    	$obj->equipos_id = $r->input('equipo');
    	$obj->vinculo = $r->input('vinculo');
    	$obj->descripcion = $r->input('descripcion');
    	$obj->save();

    	return redirect('/profile');
    }
}
