<?php

use Illuminate\Support\Facades\Route;
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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', 'layouts\AppController@index')->name('home');

Route::group(['prefix' => 'cpscn-admin'], function () {
	// Route::get('/login', 'layouts\AppController@abort404')->name('abort404');
	Auth::routes();
	Route::get('/', 'layouts\AppController@adminIndex')->name('admin.login')->middleware('authLoginToAdminHome');
	Route::group( ['middleware' => 'auth' ], function() {
		Route::get('/dashboard/key/{session_id}', 'admin\DashboardController@index')->name('admin.home');
	});
});