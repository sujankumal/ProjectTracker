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

Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

Route::post('/projectCreate','ProjectDetailController@store');

Route::post('/minuteCreate','MinuteController@store');

Route::get('/check','ProjectDetailController@index')->middleware('auth');

Route::get('/about', function () {
    return view('about');
})->middleware('auth')->name('about');

Route::get('/tasks', function () {
    return view('projecttask');
})->middleware('auth')->name('tasks');

Route::post('/projectTaskCreate','ProjectTasksController@store');
Route::post('/projectTaskDelete','ProjectTasksController@delete');
Route::post('/projectTaskShowMinute','ProjectTasksController@displayTaskForMinute');
Route::post('/checkPermisionMinute', 'ProjectTasksController@checkPermisionMinute');
Route::post('/checkPermisionProjectTask','ProjectTasksController@checkPermisionMinute');
Route::post('/checkPermisionProjectQRGen','QrController@checkPermisionProjectQRGen');
Route::post('/checkPermisionProjectQRScan','QrController@checkPermisionProjectQRScan');
Route::post('/checkPermisionProjectPPT','PowerpointController@checkPermisionProjectPPT');
Route::post('/changeBatch','ProjectDetailController@changeBatch');
Route::post('/sidebarProjectSelected','ProjectDetailController@sidebarProjectSelected');

Route::get('passwordchange', function () {
    return view('passChange');
})->middleware('auth')->name('passwordchange');

Route::any('password/update', 'PasswordChangeController@postCredentials');

Route::get('/home', 'HomeController@index')->name('home');

//redirect and callback URLs
Route::get('auth/google', 'Auth\AuthGoogleController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\AuthGoogleController@handleGoogleCallback');


Route::get('/QR', function () {
    return view('QR');
})->middleware('auth')->name('QR');

Route::post('/QRCreate', 'QrController@create');

Route::get('/QRScan', function () {
    return view('QRScan');
})->middleware('auth')->name('QRScan');

Route::post('/QRstore', 'QrController@store');
Route::post('/taskJSDyView','ProjectTasksController@index');
// Route::get('/', function()
// {
// 	return View::make('home');
// });

Route::get('/charts', function()
{
	//return View::make('mcharts');
});

Route::get('/tables', function()
{
	//return View::make('table');
});

Route::get('/forms', function()
{
	return View::make('form');
})->middleware('auth')->name('forms');

Route::get('/grid', function()
{
	//return View::make('grid');
});

Route::get('/buttons', function()
{
	//return View::make('buttons');
});


Route::get('/icons', function()
{
	//return View::make('icons');
});

Route::get('/panels', function()
{
	return View::make('panel');
})->middleware('auth')->name('panels');

Route::get('/typography', function()
{
	//return View::make('typography');
});


Route::get('/blank', function()
{
	return View::make('blank');
})->middleware('auth')->name('blank');

// Route::get('/login', function()
// {
// 	return View::make('login');
// });

Route::get('/documentation', function()
{
	return View::make('documentation');
})->middleware('auth')->name('documentation');

Route::get('/minuteForm', function()
{
	return View::make('minuteForm');
})->middleware('auth')->name('minuteForm');

Route::get('/projectForm', function()
{
	return View::make('projectForm');
})->middleware('auth')->name('projectForm');

Route::get('/aboutProject', function()
{
	return View::make('aboutProject');
})->middleware('auth')->name('aboutProject');

Route::get('/minuteCompleteDetails', function()
{
	return View::make('minuteCompleteDetails');
})->middleware('auth')->name('minuteCompleteDetails');

Route::get('/profile', function()
{
	return View::make('profile');
})->middleware('auth')->name('profile');

Route::get('/uploadppt', function()
{
	return View::make('uploadppt');
})->middleware('auth')->name('uploadppt');

Route::post('/pptUpload','PowerpointController@store');

Route::get('/showPPT', function()
{
	//return View::make('showPPT');
	echo "to do";
})->middleware('auth')->name('showPPT');


Route::get('/notifications', function()
{
	return View::make('notifications');
})->middleware('auth')->name('notifications');

Route::post('/sendNotice','NoticeController@store');
Route::post('/profilePhotoUpload','ProfileImageController@store');