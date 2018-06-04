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
    
    Route::get('/', function () {
        return view('welcome');
    });
    
        Route::get('/register',function(){
        return view('auth/register');
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
});


    
    Route::get('/baraja', function () {
        
        
        return array("numero" => rand(1, 13));
    });
    
    Route::get('/rr', function () {
        
        
        return  Resultado::all() ;
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



