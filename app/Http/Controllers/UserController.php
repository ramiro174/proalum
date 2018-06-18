<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\models\User;
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
            //Image::make($img)->resize(100,100);
    //$request->file('imagen')->store('public/images');
            Storage::delete('/public/usuarios/perfil/imagenes/' . Auth::user()->imagen);
            $img->store('public/usuarios/perfil/imagenes');
    
    // ensure every image has a different name
    $file_name = $request->file('imagen')->hashName();
    
    // save new image $file_name to database
    //$model->update(['image' => $file_name]);
     $alumno = User::findOrFail(Auth::user()->id);
        $alumno -> imagen = "$file_name";
        $alumno->save();
        return redirect("/profile");
    }
    else{
        return "nada";
     }
    }

    public function registrarEquipo(){

    }
        

}

