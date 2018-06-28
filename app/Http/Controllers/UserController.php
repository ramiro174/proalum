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
        return	redirect("/");
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

    public function imagenPerfil(Request $request){
        if ($request->hasFile('imagen')) {
            try
            {
                $img = $request->file('imagen');
                Storage::delete('/public/usuarios/perfil/imagenes/' . Auth::user()->imagen);
                $img->store('public/usuarios/perfil/imagenes');
                $file_name = "img_perfil_".Auth::user()->name;
                $alumno = User::findOrFail(Auth::user()->id);
                $alumno -> imagen = "$file_name";
                $alumno->save();
                return redirect("/profile");
            } catch (Exception $ex){
            
            return $ex;
            
            }
            
            
        }
        else{
            return "nada ";
        }
    }

   

    

}

