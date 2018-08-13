<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\models\User;
use App\models\Equipos;
use Image as Image;
use Illuminate\Support\Facades\Storage;



class UserController extends Controller
{
    public function getlogout()
    {
        Auth::logout();
        return  redirect("/");
    }
    public function metodo1()
    {

    }
    public function registerteamview()
    {
        return view("registerteam");
    }
    public function tags()
    {
        //$users = User::all();
        /*$alumnos = [];

        foreach ($users as $key) {
            $alumnos[] = array("name" =>$key->name,"id" => $key->id);
            $alumnos[] = ["name"=> $key->name,"id"=> $key->id];
        }
        return $arreglo=['alumnos'=>$alumnos];
        */

        $user = User::all();
        $user = $user->keyBy('id');
        $user->forget(Auth::user()->id);

        return $user;

    }
    public function agregarAlumnos($obj)
    {
        $user = User::all();
        $user = $user->keyBy('id');
        $miembros = Equipos::with('userMiembro')->where('id',$obj)->first();
        $miembros = $miembros->userMiembro;
        foreach ($miembros as $key) {
            foreach ($user as $key2) {
                if ($key2->id == $key->id) {
                    $user->forget($key2->id);
                }
            }
        }
        
        return $user;
    }
    public function imagenPerfil(Request $request){
       error_reporting(E_ALL);
        ini_set('display_errors', '1');
   
        if ($request->hasFile('imagen')) {
            try
            {
    
                $img = $request->file('imagen');
                if (Auth::user()->imagen != null) {
                    Storage::delete('/usuarios/perfil/imagenes/' . Auth::user()->imagen);
                }
                $img->store('/usuarios/perfil/imagenes');
                Storage::move('/usuarios/perfil/imagenes/'.$request->file('imagen')->hashName(),
                    '/usuarios/perfil/imagenes/'. "img_perfil_".Auth::user()->name );
                $file_name = "img_perfil_".Auth::user()->name;
                $alumno = User::findOrFail(Auth::user()->id);
                $alumno -> imagen = "$file_name";
                $alumno->save();
                return redirect('/profile');
                
            } catch (Exception $ex){

                return $ex;

            }
            
            
        }
        else{
            return "nada ";
        }
    }

    public function subirCurriculo(Request $request){
       error_reporting(E_ALL);
        ini_set('display_errors', '1');
        if ($request->hasFile('curriculo')) {
            try
            {
                $curriculo = $request->file('curriculo');
                if (Auth::user()->curriculo != null) {
                    Storage::delete('/usuarios/curriculos/' . Auth::user()->curriculo);
                }
                $curriculo->store('/usuarios/curriculos');
                $file_name = $request->file('curriculo')->hashName();
                $alumno = User::findOrFail(Auth::user()->id);
                $alumno -> curriculo = "$file_name";
                $alumno->save();
                return redirect('/profile');
                
            } 

        
            catch (Exception $ex){

                return $ex;

            }
            
            
        }

        else{
            return "nada ";
        }
        return "nopasonada";
    }

    public function borrarCurriculo(Request $r)
    {
        $curriculo = User::find(Auth::user()->id);
    Storage::delete('/usuarios/curriculos/' . Auth::user()->curriculo);
    $curriculo->curriculo = null;
    $curriculo->save();
    $mensaje = "¡Cambios registrados exitosamente!";

    return $mensaje;
    }
    public function perfilId($obj)
    {
        $user =  User::where('id',$obj)->first();

        
        return view('alumnos/perfilalumno')->with(compact('user'));
    }



    

}

