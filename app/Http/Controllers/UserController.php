<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;

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
}
