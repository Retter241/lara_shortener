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
    return redirect('/links');
});

Route::resource('links', 'App\Http\Controllers\LinkController');

Route::get('/{link:shortened}', 'App\Http\Controllers\RedirectController@index');
