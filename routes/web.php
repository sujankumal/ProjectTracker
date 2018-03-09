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

Route::get('/about', function () {
    return view('about');
})->middleware('auth');

Route::get('/home', 'HomeController@index')->name('home');

//redirect and callback URLs
Route::get('auth/google', 'Auth\AuthGoogleController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\AuthGoogleController@handleGoogleCallback');