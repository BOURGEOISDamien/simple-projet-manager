<?php

use Illuminate\Http\Request;

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

Route::get('/home', function () {
    return view('welcome');
});
  
Auth::routes();

Route::get('/', 'DashboardController@index'); 


Route::group(['middleware' => ['projet-access']], function () {

 	Route::get('projet/{projet}/delete', 'ProjetController@delete');
	Route::get('projet/{projet}/quit', 'ProjetController@quit');


	Route::get('tache/{tache}/toggle', 'TacheController@toggle');
	Route::get('tache/{tache}/delete', 'TacheController@delete');
	Route::get('tache/{tache}/Modifier', 'TacheController@modifier');

});

Route::post('projet/changeOrder', 'ProjetController@changeOrder');

Route::get('projet/{projet}', 'ProjetController@show')->middleware('projet-isPublic');
Route::get('join/{token}', 'ProjetController@join')->middleware('projet-join');

Route::get('auth/{provider}', 'Auth\RegisterController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\RegisterController@handleProviderCallback');

