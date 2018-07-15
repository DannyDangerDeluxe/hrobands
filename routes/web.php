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

/*
Route::get('/login', 'Auth\LoginController@showPage');
Route::post('/login', 'Auth\LoginController@loginUser');
Route::get('/register', 'Auth\LoginController@showPage');
*/

Route::get('/bands', function () {
    return view('bands');
});

Route::get('/dates', function () {
    return view('dates');
});

Route::get('/news', function () {
    return view('news');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/* dev ROUTES */
Route::get('/dev', 'DevController@showPage');
Route::post('/dev/gig', 'DevController@addGig');
Route::post('/dev/band', 'DevController@addBand');

Route::view('error', 'error');
