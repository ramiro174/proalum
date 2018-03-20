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
    
    use App\models\Resultado;
    
    Route::get('/', function () {
    return view('welcome');
});
    
    Route::get('/baraja', function () {
        
       
        return  array("numero"=>rand(1,13));
    });
    Route::post('/enviar', function (Request $resq) {
        $r=new Resultado();
        $numero=$resq->input("numero");
        $nombre=$resq->input("nombre");
        
        $r->numero=$numero;
        $r->nombre=$nombre;
        $r->save();
        
        
        return $r;
        
    
    });
    

Auth::routes();





Route::get('/home', 'HomeController@index')->name('home');
    
    Route::get('/who', function () {
        return exec('whoami');
    });
