<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
  Route::get('/', function(){
    return redirect('monumentos');
  });

  Route::get('monumentos', 'MonumentosController@index');
  Route::get('monumentos/{monumento}', 'MonumentosController@show')->where('monumento','[0-9]+');
  Route::get('opiniones/{opinione}/edit', 'OpinionesController@edit');

  Route::patch('opiniones/{opinione}', 'OpinionesController@update');
  Route::delete('opiniones/{opinione}', 'OpinionesController@delete');
  // Route::get('opiniones/{opinione}/del', 'OpinionesController@delete');

  Route::post('monumentos', 'MonumentosController@store');
  Route::post('monumentos/{monumento}', 'OpinionesController@store')->where('monumento','[0-9]+');

  Route::get('about', 'MonumentosController@about');
});
