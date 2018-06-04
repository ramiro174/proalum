<?php
    
    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | contains the "web" middleware group. Now create something great!
    |
    */
    
    use App\models\alumno;
    use App\models\Resultado;
    use Illuminate\Http\Request;
<<<<<<< HEAD
    
    Route::get('/',  function () {
        return  view('welcome');
     });
=======
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/ddd', function () {
        return view('welcome');
    });
>>>>>>> 9982a02c3369acc45c5615c96080a88c14430dba
    
        Route::get('/register', function(){
        return  view('auth/register');
    });

Route::get("/login",function(){
       return  view("auth/login");
    });
Route::group(['middleware'=>'auth'],function(){
Route::get('/logout','UserController@getlogout');
Route::get("/profile",function(){
    return view("profile");
});
Route::get('/registerproject',function(){
    return view("registerproject");
});
Route::get('/registerteam',function(){
    return view("registerteam");
    });
Route::get('/projectbrowser',function(){
    return view("browseprojects");
});

Route::get('/projectprofile',function(){
    return view("projectprofile");
});

Route::get('/teamprofile',function(){
    return view("teamprofile");
});

});
Route::post('/enviar', function (Request $resq) {
        $r = new Resultado();
        $numero = $resq->input("numero");
        $nombre = $resq->input("nombre");
        $r->numero = $numero;
        $r->nombre = $nombre;
        $r->save();
        return $r;
    });
    Route::get("/alumnos",function(){
       return alumno::all();
    });
    Route::post('/alumnos', function (Request $resq) {
        $r = new alumno();
        $nombre = $resq->input("nombre");
        $telefono = $resq->input("telefono");
        $r->nombre = $nombre;
        $r->telefono = $telefono;
        $r->save();
        return $r;
    });
    Route::get("/resultadosfinales",function(){
       
       return   view("resultadosvista")->with("Resultados",Resultado::all()->sortByDesc("numero"));
    });
    
    
    Route::get("/borrardatos",function(){
        
        Resultado::truncate();
        return redirect("/resultadosfinales");
        
        
    });
    
    Auth::routes();
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/who', function () {
        return exec('whoami');
    });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



