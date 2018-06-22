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
        return User::all(); 
    }

    public function imagenPerfil(Request $request){
        if ($request->hasFile('imagen')) {
            $img = $request->file('imagen');
            Storage::delete('/public/usuarios/perfil/imagenes/' . Auth::user()->imagen);
            $img->store('public/usuarios/perfil/imagenes');
            Storage::move('/public/usuarios/perfil/imagenes/'.$request->file('imagen')->hashName(),
              '/public/usuarios/perfil/imagenes/'. "img_perfil_".Auth::user()->name );
            $file_name = "img_perfil_".Auth::user()->name;
            $alumno = User::findOrFail(Auth::user()->id);
            $alumno -> imagen = "$file_name";
            $alumno->save();
            return redirect("/profile");
        }
        else{
            return "nada";
        }
    }

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
        
        $equipo->userLider()->attach([$idequipo->id,Auth::user()->id]);
    }

    

}

