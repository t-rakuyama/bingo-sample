<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', 'App\Http\Controllers\EntryController@index');
Route::post('/', 'App\Http\Controllers\EntryController@post');

Route::get('/game', 'App\Http\Controllers\GameController@index');
//Route::post('/game', 'App\Http\Controllers\GameController@post');
