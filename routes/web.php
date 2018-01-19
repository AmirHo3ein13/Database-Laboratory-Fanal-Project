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

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

// Teacher routes
Route::get('/teacher', 'TeacherController@index');
Route::get('/teacher/edit/{id}', 'TeacherController@edit');
Route::get('/teacher/submit_edit', 'TeacherController@submit_edit');
Route::get('/teacher/add', 'TeacherController@add');
Route::get('/teacher/delete/{id}', 'TeacherController@delete');

// User
Route::get('/profile', 'UserController@index');
Route::post('/profile/edit', 'UserController@edit');

Route::get('/logout', function (){
    Auth::logout();
    return redirect('/');
});
Route::get('/home', function (){
    return redirect('/');
});

//Course Route
Route::get('/course', 'CourseController@index');
Route::get('/course/edit/{id}', 'CourseController@edit');
Route::get('/course/submit_edit', 'CourseController@submit_edit');
Route::get('/course/add', 'CourseController@add');
Route::get('/course/delete/{id}', 'CourseController@delete');

//Lesson Route
Route::get('/lesson', 'LessonController@index');
Route::get('/lesson/edit/{id}', 'LessonController@edit');
Route::get('/lesson/submit_edit', 'LessonController@submit_edit');
Route::get('/lesson/add', 'LessonController@add');
Route::get('/lesson/delete/{id}', 'LessonController@delete');

//Project Route
Route::get('/project', 'ProjectController@index');
Route::get('/project/edit/{id}', 'ProjectController@edit');
Route::get('/project/submit_edit', 'ProjectController@submit_edit');
Route::get('/project/add', 'ProjectController@add');
Route::get('/project/delete/{id}', 'ProjectController@delete');

// PhoneNumber Route
Route::get('/phone_number', 'PhoneNumberController@index');
Route::get('/phone_number/add', 'PhoneNumberController@add');


Route::get('/testfile', 'testController@test');
Route::get('/localkube', 'testController@localkube');
