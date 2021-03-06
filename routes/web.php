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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', 'App\Http\Controllers\PagesController@home');
Route::get('/viewpost', 'App\Http\Controllers\PostsController@index');
Route::get('/createpost', 'App\Http\Controllers\PostsController@create');


Route::resource('posts', 'App\Http\Controllers\PostsController');
