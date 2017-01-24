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

Route::get('/', function () {
    return view('welcome');
});
  
Auth::routes();

Route::get('/dashboard', 'DashboardController@index'); 


Route::group(['middleware' => ['projet-access']], function () {

    Route::get('projet/{projet}', 'ProjetController@show');
	Route::get('projet/{projet}/delete', 'ProjetController@delete');
	Route::get('projet/{projet}/quit', 'ProjetController@quit');

	Route::get('tache/{tache}/toggle', 'TacheController@toggle');
	Route::get('tache/{tache}/delete', 'TacheController@delete');
	Route::get('tache/{tache}/Modifier', 'TacheController@modifier');

});


Route::get('join/{token}', 'ProjetController@join')->middleware('projet-join');
