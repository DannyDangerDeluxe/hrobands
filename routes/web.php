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
Route::get('/imprint', 'IndexController@showFaq');
Route::view('/news', 'news'); 
Route::view('error', 'error');

// info pages
Route::get('/gigs', 'IndexController@showGigs');
Route::get('gigs/{id}', 'GigController@showGigDetailPage');
Route::get('/bands', 'IndexController@showBands');
Route::get('bands/{id}', 'IndexController@showBandDetailPage');

// dashboard
Route::prefix('/dash')->group(function () {
	Route::get('/home', 'HomeController@index')->middleware('auth');
	Route::get('/profile', 'HomeController@showProfile')->middleware('auth');
	Route::get('/band', 'HomeController@showUserBand')->middleware('auth');
	Route::post('/band/register', 'HomeController@registerBand')->middleware('auth');
	Route::get('/media', 'HomeController@showMedia')->middleware('auth');
	Route::get('/settings', 'HomeController@showSettings')->middleware('auth');
});

// media
Route::post('userimageupload','ImageUploadController@userImageUpload')->middleware('auth');
Route::post('profileimageupload','ImageUploadController@profileImageUpload')->middleware('auth');
Route::post('/bandimageupload','ImageUploadController@bandImageUpload')->middleware('auth');
Route::post('gigimageupload','ImageUploadController@gigImageUpload')->middleware('auth');

// gigs
Route::get('/dash/gigs', 'HomeController@showGigs');
Route::post('/registergig', 'GigController@registerGig');

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login')->middleware('auth');
Route::post('login', 'Auth\LoginController@login')->middleware('auth');
Route::post('logout', 'Auth\LoginController@logout')->name('logout')->middleware('auth');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@store')->middleware('auth');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request')->middleware('auth');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email')->middleware('auth');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset')->middleware('auth');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->middleware('auth');
