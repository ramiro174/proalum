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

Route::get('/', function () {
    return view('welcome');
});
    
    Route::get('/baraja', function () {
        
       
        return  array("numero"=>rand(1,13));
    });
    

Auth::routes();



Route::get('/home', 'HomeController@index')->name('home');
    
    Route::get('/who', function () {
        return exec('whoami');
    });
