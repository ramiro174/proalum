<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Equipos;
use App\models\Proyectos;
use App\models\Detalles;
use Illuminate\Support\Facades\Storage;
use Auth;

class ProyectoController extends Controller
{   

    public function obtenerEquipos()
    {
        $equipos = Equipos::misequiposlider();
        
        return view('registrarproyecto')->with(compact('equipos'));
    }
    public function buscarProyecto($obj)
    {   
        $proyecto = Proyectos::where('id',$obj)->first();
        $detalles = Detalles::where('proyectos_id',$obj)->get();

        $equipo = Equipos::with('userLider')->where('id',$proyecto->equipos_id)->first();
        $lider = $equipo->userLider[0]->pivot->user_lider_id;
        $proyectos = Proyectos::where('equipos_id',$proyecto->equipos_id)->get();
        $proyectos = $proyectos->keyBy('id');
        $proyectos->forget($proyecto->id);
        return view('perfilproyecto')->with(compact('proyecto','equipo','proyectos','lider','detalles'));
    }
    public function obtenerProyectos()
    {
        $obj = Proyectos::with('equipos')->get();
        $masvotos = Proyectos::all()->sortByDesc('votos')->take(3);

        
        
        return view('buscarproyectos')->with(compact('obj','masvotos'));
        
    }
    public function obtenerProyectosBuscador()
    {
        $obj = Proyectos::with('equipos')->get();
        

        return view('proyectos/buscador')->with(compact('obj'));
        
    }

    public function registrarProyecto(Request $r)
    {
        $obj = new Proyectos();

        $obj->nombre_proyecto = $r->input('name');
        $obj->equipos_id = $r->input('equipo');
        $obj->vinculo = $r->input('vinculo');
        $obj->descripcion = $r->input('descripcion');
        $obj->save();
        $r->session()->flash('mensaje','Equipo registrado exitosamente!');
        return redirect('/profile');
    }

    public function proyectosAlumno(){
        $proyectos = Proyectos::misproyectos();
        
        return view('proyectos/listaproyectos')->with(compact('proyectos'));
    }
    public function proyectosAlumnoid($obj){
        $proyectos = Proyectos::proyectosalumno($obj);
        
        return view('proyectos/listaproyectos')->with(compact('proyectos'));
    }
    public function listaProyectosEquipo($obj)
    {
        $proyectos = Proyectos::where('equipos_id',$obj)->get();
        $equipo = Equipos::where('id',$obj)->first();
        
        return view('proyectos/listaproyectosequipo')->with(compact('proyectos','equipo'));
    }
    public function modalEditarProyecto(Request $r)
    {
        $proyecto = Proyectos::where('id',$r->input('idproyecto'))->first();
        if ($r->input('nombre') != null) {
            $proyecto->nombre_proyecto = $r->input('nombre');
        }
        if ($r->input('descripcion') != null) {
            $proyecto->descripcion = $r->input('descripcion');
        }
        $proyecto->save();
        return "Cambios Registrados";
    }
        public function modalAgregarDetalle(Request $request){
       error_reporting(E_ALL);
        ini_set('display_errors', '1');
        if ($request->hasFile('detalleimg')) {
            try
            {
                $img = $request->file('detalleimg');
                $img->store('/proyectos/detalles');
                /*Storage::move('/usuarios/perfil/imagenes/'.$request->file('imagen')->hashName(),
                    '/usuarios/perfil/imagenes/'. "img_perfil_".Auth::user()->name );*/
                $file_name = $request->file('detalleimg')->hashName();
                $detalle = new Detalles();
                $detalle->descripcion = $request->input('detalledesc');
                $detalle->imagen = $file_name;
                $detalle->proyectos_id = $request->input('inputiddetalle');
                $detalle->save();
                
                return redirect('/perfilproyecto/'.$request->input('inputiddetalle'));
                
            } catch (Exception $ex){

                return $ex;

            }
            
            
        }
        if($request->input('detalledesc') != null)
        {
            $detalle = new Detalles();
                $detalle->descripcion = $request->input('detalledesc');
                $detalle->proyectos_id = $request->input('inputiddetalle');
                $detalle->save();
                return redirect('/perfilproyecto/'.$request->input('inputiddetalle'));
        }
        return "nada";
    }
    public function modalBorrarDetalle(Request $r)
{
    
    $detalle = Detalles::find($r->input('iddetalle'));
    Storage::delete('/proyectos/detalles' . $detalle->imagen);
    $detalle->delete();
    $mensaje = "¡Cambios registrados exitosamente!";

    return $mensaje;
}
public function modalBorrarVinculo(Request $r)
{
    
    $proyecto = Proyectos::find($r->input('idproyecto'));
    $proyecto->vinculo = null;
    $proyecto->save();
    $mensaje = "¡Vinculo Eliminado!";

    return $mensaje;
}
public function modalAgregarVinculo(Request $r)
{
    $proyecto = Proyectos::find($r->input('idproyecto'));
    $proyecto->vinculo = $r->input('vinculo');
    $proyecto->save();
    $mensaje = "¡Cambios registrados exitosamente!";
    return $mensaje;
}
public function imagenProyecto(Request $request)
{
        $proyecto = Proyectos::find($request->input('input-proyecto-id'));
     error_reporting(E_ALL);
        ini_set('display_errors', '1');
   
        if ($request->hasFile('imagen')) {
            try
            {    
                $img = $request->file('imagen');
                if ($proyecto->imagen != null) {
                    Storage::delete('/proyectos/' . $proyecto->imagen);
                }
                $img->store('/proyectos');
                Storage::move('/proyectos/'.$request->file('imagen')->hashName(),
                    '/proyectos/'. "img_perfil_".$proyecto->nombre_proyecto);
                $file_name = "img_perfil_".$proyecto->nombre_proyecto;
               
                $proyecto -> imagen = "$file_name";
                $proyecto->save();
                return redirect('/perfilproyecto/'.$request->input('input-proyecto-id'));
                
            } catch (Exception $ex){

                return $ex;

            }
            
            
        }
        else{
            return "nada ";
        }
}
public function botonLike(Request $r)
{
    $proyecto = Proyectos::where('id',$r->input('idproyecto'))->first();
    $votousuario = new Proyectos();
    $prueba = Proyectos::votosalumno($r->input('idproyecto'));
    $votostotal = count($prueba);
    
    if($proyecto->votos != null)
    {
        if ($votostotal == 0) {
            $proyecto->votos = $proyecto->votos + 1;
        $proyecto->save();
        $votousuario->userVotos()->attach([["proyectos_id"=>$r->input('idproyecto'),
                                        "users_id"=>Auth::user()->id]]);
        return "nada";
        }
        else{
            return "nada";
        }
        
    }else{
    $proyecto->votos = 1;
    $votousuario->userVotos()->attach([["proyectos_id"=>$r->input('idproyecto'),
                                        "users_id"=>Auth::user()->id]]);
    $proyecto->save();
    return "nada";
}
}
public function bienvenido()
{
    $proyectos = Proyectos::all()->sortByDesc('votos')->take(6);

    return view('bienvenidos')->with(compact('proyectos'));
}

}
