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
Route::get('/admin/excel-import', 'AdminController@excelImport');
Route::post('/admin/excel-import', 'AdminController@excelImportSave');
Route::get('/admin/excel-download', 'AdminController@excelDownload');

// syllabus
Route::get('/admin/class/syllabus', 'AdminController@syllabus');
Route::post('/admin/class/syllabus', 'AdminController@syllabusSave');
Route::get('/admin/syllabus/download/{id}', 'AdminController@downloadSyllabus');

// subjects
Route::get('/admin/subjects', 'AdminClassRoutine@subjects');
Route::post('/admin/subject/add', 'AdminClassRoutine@addSubject');

// class-routine
Route::get('/admin/class/section/class-routine', 'AdminClassRoutine@classRoutines');
Route::get('/admin/class/section/class-routine/details/{id}', 'AdminClassRoutine@classRoutineDetails');
Route::post('/admin/add-class-routine', 'AdminClassRoutine@addRoutine');
Route::post('/admin/add-class-routine',);


