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
	Route::get('/resource', 'AdminController@resource')->name('admin.resource');
	Route::post('/resource', 'AdminController@store')->name('admin.store');
	Route::put('/resource', 'AdminController@remove')->name('admin.remove');
	Route::get('/company', 'AdminController@company')->name('admin.company');
	Route::post('/company', 'AdminController@positions')->name('admin.positions');
	Route::put('/company', 'AdminController@delete')->name('admin.delete');
	Route::get('/', 'AdminController@index')->name('admin.dashboard');
});

Route::get('/view', 'ViewController@index')->middleware('auth');
Route::post('/view', 'ViewController@show')->name('view.show')->middleware('auth');

Route::get('/job', 'RegisterJobController@index')->middleware('auth');
Route::post('/job', 'RegisterJobController@store')->name('registerjob.store')->middleware('auth');

Route::get('/external', 'ResourceController@index')->middleware('auth');
Route::get('/external', 'ResourceController@show')->name('external.show')->middleware('auth');

Route::get('/contact', function () {
    return view('contact');
});
Route::post('/contact', 'ContactController@index')->name('contact.form');

// Password Reset Routes
Route::get('/auth/password/reset/{token?}', 'Auth\ResetPasswordController@showResetForm');
Route::post('/auth/password/email', 'Auth\ResetPasswordController@sendResetLinkEmail');
Route::post('/auth/password/reset', 'Auth\ResetPasswordController@reset');