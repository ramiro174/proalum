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
    use App\models\User;
    use Illuminate\Http\Request;

/*=======================PROALUMNO=============================*/
    Route::get('/',  function () {
        return  view('bienvenidos');
     });
        Route::get('/register', function(){
        return  view('auth/register');
    });
Route::get('/perfilproyecto',function(){
    return view('perfilproyecto');
});
Route::get("/login",function(){
       return  view("auth/login");
    });
Route::get('/teamprofile',function(){
    return view("perfilequipo");
});
Route::get('/listaproyectosequipo',function(){
    return view('proyectos/listaproyectosequipo');
});
Route::get('/projectbrowser','ProyectoController@obtenerProyectos');


Route::get('/buscador',function(){
    return view('proyectos/buscador');
});
Route::group(['middleware'=>'auth'],function(){

Route::post('/registrarequipo','UserController@registrarEquipo');

Route::get('/logout','UserController@getlogout');
Route::get("/profile",function(){
    return view("profile");
});
Route::get('/registerproject','ProyectoController@obtenerEquipos');
Route::post('/registrarproyecto','ProyectoController@registrarProyecto');

Route::get('/registerteam',function(){
    return view("registrarequipo");
});
Route::get('/llenartags','UserController@tags');


Route::get('/projectprofile',function(){
    return view("perfilequipo");
});
Route::get('/listaequipos',function(){
    return view('/equipos/listaequipos');
});

Route::get('/listaproyectos',function(){
    return view('/proyectos/listaproyectos');
});
Route::post('/subirimagen','UserController@imagenPerfil');

});

/*=======================PROALUMNO======Comentario de prueba=======================*/

    



    Auth::routes();
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/who', function () {
        return exec('whoami');
    });
