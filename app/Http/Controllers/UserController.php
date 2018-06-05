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

    public function tags()
    {
    	$users = User::all();
    	$alumnos = [];

    	foreach ($users as $key) {
    		$alumnos[] = array($key->name => $key->id,   ); 
    	}
    	
    	return view('registerteam')->with('alumnos',$alumnos);
    }

}

