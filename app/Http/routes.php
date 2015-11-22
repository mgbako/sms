
<?php

Route::get('/', 'WelcomeController@index');
Route::get('home', 'WelcomeController@index');
Route::get('/subjectReceptions', ['as'=>'subjectReceptions.subjectReception', 'uses'=>'SubjectQuestionsController@subjectReception']);

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
Route::get('classes/{id}/subjects', ['as'=>'classes.subjects', 'uses'=>'ClassesSubjectsController@index']);

Route::get('classes/{id}/subjects/{subjectId}/delete', ['as'=>'classes.subjects.delete', 'uses'=>'ClassesSubjectsController@delete']);
Route::resource('classes.subjects', 'ClassesSubjectsController');

Route::get('classes/{id}/subjects/{subjectId}/questions/{questionId}/delete', ['as'=>'classes.subjects.questions.delete', 'uses'=>'QuestionsController@delete']);
Route::resource('classes.subjects.questions', 'QuestionsController');

Route::resource('/subjectQuestions', 'SubjectQuestionsController');
Route::get('/subjectQuestions/classes/{classeId}/subjects/{subjectId}/delete', ['as'=>'subjectQuestions.delete', 'uses'=>'SubjectQuestionsController@delete']);

Route::resource('/subjectProgess', 'SubjectProgressController');
Route::resource('/subjectAssigned', 'SubjectAssignedController');
Route::resource('users', 'UsersController');
Route::resource('exams', 'ExamsController');
Route::resource('admins', 'Admin\AdminController');
Route::controllers([
  'account' => 'Auth\AuthController',
  'password' => 'Auth\PasswordController',
]);
