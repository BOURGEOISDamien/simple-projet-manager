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

Route::get('projet/{projet}', 'ProjetController@show')->middleware('projet-access');
Route::get('projet/{projet}/delete', 'ProjetController@delete')->middleware('projet-access');
Route::get('projet/{projet}/quit', 'ProjetController@quit')->middleware('projet-access');

Route::get('join/{token}', 'ProjetController@join');

Route::get('tache/{tache}/toggle', 'TacheController@toggle')->middleware('projet-access');
Route::get('tache/{tache}/delete', 'TacheController@delete')->middleware('projet-access');
Route::get('tache/{tache}/Modifier', 'TacheController@modifier')->middleware('projet-access');
