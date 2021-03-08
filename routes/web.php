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
		Route::get('profile/key/{session_id}', 'admin\profile\ProfileController@index')->name('profile');

		Route::get('shift/key/{session_id}', 'admin\shift\ShiftController@index')->name('shift');
		Route::post('shift/key/{session_id}', 'admin\shift\ShiftController@addShift')->name('shift');
		Route::post('shift/update/key/{session_id}', 'admin\shift\ShiftController@update')->name('shift.update');

		Route::get('class/key/{session_id}', 'admin\classes\classesController@index')->name('class');
		Route::post('class/key/{session_id}', 'admin\classes\ClassesController@addClass')->name('class');
		Route::post('class/update/key/{session_id}', 'admin\classes\ClassesController@update')->name('class.update');


		Route::get('group/key/{session_id}', 'admin\group\GroupController@index')->name('group');
		Route::post('group/key/{session_id}', 'admin\group\GroupController@addGroup')->name('group');
		Route::post('group/update/key/{session_id}', 'admin\group\GroupController@update')->name('group.update');


		Route::get('section/key/{session_id}', 'admin\section\SectionController@index')->name('section');
		Route::post('section/key/{session_id}', 'admin\section\SectionController@addSection')->name('section');
		Route::post('section/update/key/{session_id}', 'admin\section\SectionController@update')->name('section.update');

		Route::get('subject/key/{session_id}', 'admin\subject\SubjectController@index')->name('subject');
		Route::post('subject/key/{session_id}', 'admin\subject\SubjectController@addSubject')->name('subject');
		Route::post('subject/update/key/{session_id}', 'admin\subject\SubjectController@update')->name('subject.update');

		Route::get('period/key/{session_id}', 'admin\period\PeriodController@index')->name('period');

		Route::get('room/key/{session_id}', 'admin\room\RoomController@index')->name('room');
		Route::post('room/key/{session_id}', 'admin\room\RoomController@addRoom')->name('room');
		Route::post('room/update/key/{session_id}', 'admin\room\RoomController@update')->name('room.update');

		Route::get('teacher/key/{session_id}', 'admin\teacher\TeacherController@index')->name('teacher');
	});
});

// ajax routes
Route::post('/shift/remove', 'admin\shift\ShiftController@remove')->name('shift.remove');
Route::post('/class/remove', 'admin\classes\ClassesController@remove')->name('class.remove');
Route::post('/group/remove', 'admin\group\GroupController@remove')->name('group.remove');
Route::post('/section/remove', 'admin\section\SectionController@remove')->name('section.remove');
Route::post('/subject/remove', 'admin\subject\SubjectController@remove')->name('subject.remove');
Route::post('/room/remove', 'admin\room\RoomController@remove')->name('room.remove');