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

// General Pages
Route::get('/', 'IndexController@showHome');
Route::get('/impressum', 'IndexController@showFaq');
Route::view('/news', 'news'); 
Route::view('error', 'error');

// info pages
Route::get('/gigs', 'IndexController@showGigs');
Route::get('gigs/{id}', 'GigController@showGigDetailPage');
Route::get('/bands', 'IndexController@showBands');
Route::get('bands/{id}', 'IndexController@showBandDetailPage');

// dashboard
Route::prefix('/dash')->group(function () {
	Route::get('/home', 'HomeController@index');
	Route::get('/profile', 'HomeController@showProfile');
	Route::get('/band', 'HomeController@showUserBand');
	Route::post('/band/register', 'HomeController@registerBand');
	Route::get('/media', 'HomeController@showMedia');
	Route::get('/settings', 'HomeController@showSettings');
});

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
