<?php

Route::get('/', 'WelcomeController@index');
Route::get('home', 'WelcomeController@index');
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
Route::controllers([
  'account' => 'Auth\AuthController',
  'password' => 'Auth\PasswordController',
]);
