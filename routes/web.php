<?php

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


Route::get('/', 'IndexController@showHome');

Route::get('/login', 'Auth\LoginController@showPage');
Route::post('/login', 'Auth\LoginController@loginUser');
Route::get('/register', 'Auth\LoginController@showPage');

Route::get('/bands', function () {
    return view('bands');
});

Route::get('/dates', function () {
    return view('dates');
});

Route::get('/blog', function () {
    return view('blog');
});