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
    	$users = User::all();
    	$alumnos;

    	foreach ($users as $key) {
    		//$alumnos[] = array("name" =>$key->name,"id" => $key->id);
    		$alumnos = ["value"=> $key->name,"data"=> $key->id]; 
    	}
    	return $arreglo=['alumnos'=>$alumnos];
    }

}

