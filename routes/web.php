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

Route::get('/home', 'HomeController@index')->name('home');

// start

//Route::get('/home', 'WebController@home');

//admin

Route::get('/admin', 'AdminController@dashboard');
Route::get('/teacher-registration', 'AdminController@teacherRegistration');

// admin-teacher
Route::get('/admin/teachers', 'AdminController@allTeachers');
Route::get('/admin/teacher/add-new', 'AdminController@addNewTeacher');
Route::Post('/admin/teacher/add-new', 'AdminController@saveTeacher');

// admin-class
Route::get('/admin/class', 'AdminController@class');
Route::post('/admin/class', 'AdminController@saveClass');
Route::get('/admin/section', 'AdminController@section');
Route::post('/admin/section', 'AdminController@saveSection');

// admin-student
Route::get('/admin/select-class', 'AdminController@selectClass');
Route::get('/admin/add-new-student/{id}', 'AdminController@addNewStudent');
Route::post('/admin/add-new-student', 'AdminController@addNewStudentSave');
Route::get('/admin/student-info', 'AdminController@studentInfo');


