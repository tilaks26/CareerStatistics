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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->middleware('auth');

Route::prefix('admin')->group(function() {
	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::get('/', 'AdminController@index')->name('admin.dashboard');
});

Route::get('/view', function () {
    return view('viewstatistics');
})->middleware('auth');

Route::get('/job', function () {
    return view('registerjob');
})->middleware('auth');

Route::get('/external', function () {
    return view('external');
})->middleware('auth');

Route::get('/contact', function () {
    return view('contact');
});
Route::post('/contact', 'ContactController@index');

// Password Reset Routes
Route::get('/auth/password/reset/{token?}', 'Auth\ResetPasswordController@showResetForm');
Route::post('/auth/password/email', 'Auth\ResetPasswordController@sendResetLinkEmail');
Route::post('/auth/password/reset', 'Auth\ResetPasswordController@reset');