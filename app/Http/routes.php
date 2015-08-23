<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', ['as'=>'register.store', 'uses'=> 'Auth\AuthController@postRegister']);

Route::group(['middleware'=> 'auth'], function(){

	Route::resource('/', 'HomeController');


	Route::get('classes/{id}/delete', ['as'=>'classes.delete', 'uses'=>'Admin\ClassesController@delete']);
	Route::resource('classes', 'Admin\ClassesController');

	Route::get('subjects/{id}/delete', ['as'=>'subjects.delete', 'uses'=>'Admin\SubjectsController@delete']);
	Route::resource('subjects', 'Admin\SubjectsController');

	Route::get('students/{id}/delete', ['as'=>'students.delete', 'uses'=>'Admin\StudentsController@delete']);
	Route::resource('students', 'Admin\StudentsController');

	Route::get('teachers/{id}/delete', ['as'=>'teachers.delete', 'uses'=>'Admin\TeachersController@delete']);
	Route::resource('teachers', 'Admin\TeachersController');

	Route::get('questions/{id}/delete', ['as'=>'questions.delete', 'uses'=>'QuestionsController@delete']);
	Route::resource('questions', 'Admin\QuestionsController');

	Route::get('users/{id}/delete', ['as'=>'users.delete', 'uses'=>'UsersController@delete']);
	Route::resource('users', 'UsersController');

	Route::resource('exams', 'ExamsController');

});

