<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


route::get('/familia', function(){
    return view('api.familia');
});

Route::group([
    'prefix' => 'api', 
    'middleware' => 'cors'
    ], function(){
    
    Route::get('familia','ctrl_familia@index');
    Route::get('familia/post', 'ctrl_familia@crear');
    Route::get('familia/put/{id}', 'ctrl_familia@update');
    Route::get('familia/delete/{id}', 'ctrl_familia@delete');

    Route::get('medida','res_medida@index');
    
    Route::resource('catalogo', 'res_catalogo');
});
