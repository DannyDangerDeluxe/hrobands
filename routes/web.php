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
Route::get('/imprint', 'IndexController@showFaq');
Route::get('/dates', 'IndexController@showGigs');
Route::view('/gigs', 'content.gigs');
Route::view('/bands', 'bands'); 
Route::view('/news', 'news'); 
Route::view('error', 'error');

// dashboard / home
Route::get('/dash/home', 'HomeController@index');
Route::get('/dash/profile', 'HomeController@showProfile');
Route::get('/dash/band', 'HomeController@showUserBand');
Route::post('/dash/band/register', 'HomeController@registerBand');
Route::get('/dash/media', 'HomeController@showMedia');
Route::get('/dash/settings', 'HomeController@showSettings');

// media
Route::post('userimageupload','ImageUploadController@userImageUpload');
Route::post('profileimageupload','ImageUploadController@profileImageUpload');
Route::post('/bandimageupload','ImageUploadController@bandImageUpload');
Route::post('gigimageupload','ImageUploadController@gigImageUpload');

// gigs
Route::get('/dash/gigs', 'HomeController@showGigs');
Route::post('/registergig', 'GigController@registerGig');

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@store');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
