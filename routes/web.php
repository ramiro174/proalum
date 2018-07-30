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
Route::get('/perfilproyecto/{id?}',[
    'as' => 'obj',
    'uses' => 'ProyectoController@buscarProyecto'
]);
Route::get("/login",function(){
       return  view("auth/login");
    });

Route::get('/teamprofile/{id?}',[
    'as' => 'obj',
    'uses'=>'EquipoController@buscarequipo']);

Route::get('/teamprofilevista/{id?}',function($id){
    return view('perfilequipo');
});
Route::get('/listaproyectosid/{id?}',[
'as' => 'obj',
'uses' => 'ProyectoController@proyectosAlumnoid'
]);
Route::get('/listaequiposid/{id?}',[
'as' => 'obj',
'uses' => 'EquipoController@misEquiposid'
]);

Route::get('/listaproyectosequipo/{id?}',[
    'as' => 'obj',
    'uses' => 'ProyectoController@listaProyectosEquipo'
]);
Route::get('/projectbrowser','ProyectoController@obtenerProyectos');
Route::get('/buscador','ProyectoController@obtenerProyectosBuscador');
Route::get("/perfilalumno/{id?}",[
'as' =>'obj',
'uses' => 'UserController@perfilId']);
Route::group(['middleware'=>'auth'],function(){
Route::post('/registrarequipo','EquipoController@registrarEquipo');
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
Route::get('/extratags/{id?}',[
'as' => 'obj',
'uses' => 'UserController@agregarAlumnos']);
Route::get('/projectprofile',function(){
    return view("perfilequipo");
});
Route::get('/listaequipos','EquipoController@misEquipos');
Route::get('/listaproyectos','ProyectoController@proyectosAlumno');
Route::post('/subirimagen','UserController@imagenPerfil');
Route::post('/modalagrega','EquipoController@modalagregar');
Route::post('/modaleditar','EquipoController@modaleditar');
Route::post('/modalborrar','EquipoController@modalborrar');
Route::post('/modaleditartitulo','EquipoController@modaleditartitulo');
Route::post('/modaleditarproyecto','ProyectoController@modalEditarProyecto');

});
/*=======================PROALUMNO=============================*/

    



    Auth::routes();
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/who', function () {
        return exec('whoami');
    });
