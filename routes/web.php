<?php

use App\Section;

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
Route::get('/admin/class/section/class-routine', 'AdminClassRoutine@classRoutines')->name('classRoutine');
Route::post('/admin/add-class-routine', 'AdminClassRoutine@addRoutine')->name('addRoutine');
Route::get('/admin/update-class-routine/{id}', 'AdminClassRoutine@updateRoutine');
Route::post('/admin/update-class-routine/{id}', 'AdminClassRoutine@updateRoutineSave');
Route::get('/admin/class/section/class-routine/periods/{id}', 'AdminClassRoutine@periods');
Route::post('/admin/class/section/class-routine/periods/save/{id}', 
'AdminClassRoutine@savePeriodInfo');
Route::get('/admin/class/section/class-routine/periods/details/{id}',
'AdminClassRoutine@periodDetails');
Route::post('/admin/class/section/class-routine/periods/details/save', 
'AdminClassRoutine@savePeriodDetails');
Route::get('/admin/update-period/{id}', 'AdminClassRoutine@updatePeriod');
Route::post('/admin/update-period/{id}', 'AdminClassRoutine@updatePeriodSave');

// ajax get
Route::get('/getSections/{id}', 'AdminClassRoutine@getSections');



// assign teacher
Route::get('/admin/assign-teacher/section', 'AdminAssignTeacher@sectionAssign');
Route::post('/admin/assign-teacher/section/save', 'AdminAssignTeacher@sectionAssignSave');
Route::get('/admin/assign-teacher/subject', 'AdminAssignTeacher@subjectAssign');
Route::post('/admin/assign-teacher/subject/save', 'AdminAssignTeacher@subjectAssignSave');


// school
Route::get('/admin/school/info', 'AdminController@schoolInfo');
Route::get('/admin/school/info/update', 'AdminController@updateInfo');
Route::post('/admin/school/info/update/save', 'AdminController@updateInfoSave');


// email send
Route::get('/admin/mail/', 'EmailController@adminMail');
Route::get('/admin/send-mail', 'EmailController@adminSendMail');
Route::get('/admin/mail/user/{email}', 'EmailController@adminUserMail');

// users
Route::get('/admin/users', 'AdminController@users');

// Notice
Route::get('/admin/notice', 'AdminController@notices');
Route::post('/admin/notice', 'AdminController@noticeSave');

//accountant and staff
Route::get('/admin/user/staffs', 'UserController@staffs');
Route::get('/admin/user/accountants', 'UserController@accountants');
Route::get('/admin/user/staff/add', 'UserController@addStaff');
Route::get('/admin/user/accountant/add', 'UserController@addAccountant');
Route::post('/admin/user/staff/add/save', 'UserController@addStaffSave');
Route::post('/admin/user/accountant/add/save', 'UserController@addAccountantSave');

// Promotion 
Route::get('/admin/session', 'SessionController@index');
Route::get('/admin/session/store', 'SessionController@store');
Route::get('/admin/session/change-status/{id}', 'SessionController@changeStatus');
Route::get('/admin/session/update/view/{id}', 'SessionController@updateSessionView');
Route::post('/admin/session/update/', 'SessionController@updateSession');