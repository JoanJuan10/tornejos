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
Route::post('/tournament/create', 'TournamentController@store')->name('storeTournament');
Route::get('/tournament/edit', 'TournamentController@edit')->name('editTournament');
Route::post('/tournament/edit', 'TournamentController@update')->name('updateTournament');
Route::post('/tournament/delete', 'TournamentController@destroy')->name('deleteTournament');
Route::get('/tournament/{ID}', 'TournamentController@show')->name("showTournament");
