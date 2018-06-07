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
        return  view('welcome');
     });
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
    return view('registerproject');
});

Route::get('/registerteam',function(){
    return view("registerteam");
});
Route::get('/llenartags','UserController@tags');
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

/*=======================PROALUMNO=============================*/

    

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
  
    
    Auth::routes();
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/who', function () {
        return exec('whoami');
    });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



