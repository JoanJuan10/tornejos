<?php

use Illuminate\Support\Facades\Route;

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
})->name('main');

Auth::routes();

Route::get('/home', function () {
    return redirect("/");
})->name('home');

Route::get('/privacitat', function () {
    return view("privacitat");
})->name("privacitat");


Route::get('/termes', function () {
    return view("termes");
})->name("termes");

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/games', 'GameController@index')->name('listGames');

Route::get('/tournaments/{idgame}', 'TournamentController@index')->name('listTournaments');

Route::get('/tournament/create/{idgame?}', 'TournamentController@create')->name('createTournament');
Route::post('/tournament/store', 'TournamentController@store')->name('storeTournament');
Route::get('/tournament/edit/{ID}', 'TournamentController@edit')->name('editTournament');
Route::post('/tournament/{ID}', 'TournamentController@update')->name('updateTournament');
Route::get('/tournament/delete/{ID}', 'TournamentController@destroy')->name('deleteTournament');
Route::get('/tournament/{ID}/openinscription', 'TournamentController@inscripciones')->name("inscripcionesTorneo");
Route::get('/tournament/{ID}/start', 'TournamentController@start')->name("empezarTorneo");
Route::get('/tournament/{ID}', 'TournamentController@show')->name("showTournament");
