<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\models\User;

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
    $request->file('imagen')->store('public/images');
    
    // ensure every image has a different name
    $file_name = $request->file('imagen')->hashName();
    
    // save new image $file_name to database
    //$model->update(['image' => $file_name]);
     $alumno = User::findOrFail(Auth::user()->id);
        $alumno -> imagen = "$file_name";
        $alumno->save();
    }
    else{
        return "nada";
     }
    }
        

}

