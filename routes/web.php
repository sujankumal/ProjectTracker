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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');
Route::post('/projectCreate','ProjectDetailController@store');
Route::post('/minuteCreate','MinuteController@store');
Route::get('/check','ProjectDetailController@index');
Route::get('/about', function () {
    return view('about');
})->middleware('auth');
Route::get('passwordchange', function () {
    return view('passChange');
})->name('passwordchange');
Route::any('password/update', 'PasswordChangeController@postCredentials');

Route::get('/home', 'HomeController@index')->name('home');

//redirect and callback URLs
Route::get('auth/google', 'Auth\AuthGoogleController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\AuthGoogleController@handleGoogleCallback');


Route::get('/QR', function () {
    return view('QR');
})->middleware('auth');
Route::post('/QRCreate', 'QrController@create');
// Route::get('/', function()
// {
// 	return View::make('home');
// });

Route::get('/charts', function()
{
	return View::make('mcharts');
});

Route::get('/tables', function()
{
	return View::make('table');
});

Route::get('/forms', function()
{
	return View::make('form');
});

Route::get('/grid', function()
{
	return View::make('grid');
});

Route::get('/buttons', function()
{
	return View::make('buttons');
});


Route::get('/icons', function()
{
	return View::make('icons');
});

Route::get('/panels', function()
{
	return View::make('panel');
});

Route::get('/typography', function()
{
	return View::make('typography');
});

Route::get('/notifications', function()
{
	return View::make('notifications');
});

Route::get('/blank', function()
{
	return View::make('blank');
});

// Route::get('/login', function()
// {
// 	return View::make('login');
// });

Route::get('/documentation', function()
{
	return View::make('documentation');
});

Route::get('/minuteForm', function()
{
	return View::make('minuteForm');
});

Route::get('/projectForm', function()
{
	return View::make('projectForm');
});
