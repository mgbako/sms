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

Route::get('/classes/{id}/exams',  ['as'=>'classes.exams.index', 'uses'=>'ExamsController@index']);
Route::get('/classes/{id}/subjects/{subjectId}/exams',  ['as'=>'classes.subjects.exams.show', 'uses'=>'ExamsController@show']);
Route::resource('classes.subjects.exams', 'ExamsController');

Route::resource('/subjectQuestions', 'SubjectQuestionsController');
Route::get('/subjectQuestions/classes/{classeId}/subjects/{subjectId}/delete', ['as'=>'subjectQuestions.delete', 'uses'=>'SubjectQuestionsController@delete']);

Route::get('/result/myresult/{slug}', ['as'=>'results.myresult', 'uses'=>'ResultsController@myresult']);
Route::get('/results/all', ['as'=>'results.all', 'uses'=>'ResultsController@index']);
Route::get('results/subjects/{subjects}', ['as'=>'results.subjects', 'uses'=>'ResultsController@subjects']);
Route::get('results/class/{class}', ['as'=>'results.classes', 'uses'=>'ResultsController@class']);
Route::get('results/class/{student}', ['as'=>'results.students', 'uses'=>'ResultsController@student']);

Route::get('/subjectQuestions/classes/{classeId}/subjects/{subjectId}/submit', ['as'=>'subjectQuestions.submit', 'uses'=>'SubjectQuestionsController@submit']);
Route::get('/subjectQuestions/classes/{classeId}/subjects/{subjectId}/approve', ['as'=>'subjectQuestions.approve', 'uses'=>'SubjectQuestionsController@approve']);
Route::get('activateexams', ['as'=>'exams.activate', 'uses'=>'SubjectQuestionsController@activate']);
Route::get('writeexam/classes/{classeId}/subject/{subjectId}', ['as'=>'exam.write', 'uses'=>'SubjectQuestionsController@write']);
Route::get('/subjectQuestions/class/{classeId}/subjects/{subjectId}/delete', ['as'=>'subjectQuestions.delete', 'uses'=>'SubjectQuestionsController@delete']);
Route::resource('profile', 'ProfileController');

Route::resource('/schools', 'SchoolController');
Route::resource('/subjectProgess', 'SubjectProgressController');
Route::resource('/subjectAssigned', 'SubjectAssignedController');
Route::resource('/subjectAnalysis', 'SubjectAnalysisController');
Route::resource('users', 'UsersController');


/*------------------ Exams -----------------*/
Route::get('/classes/{id}/subjects/{subjectId}/exams',  ['as'=>'classes.subjects.examHall', 'uses'=>'ExamsController@hall']);
Route::resource('classes.subjects.exams', 'ExamsController');

/*------------------ Results -----------------*/
Route::get('/student/{id}/classe/{classeId}/subject/{subjectId}/result', ['as'=>'results.show', 'uses'=>'ResultsController@show']);

Route::get('/classes/{id}/subjects/{subjectId}/results',  ['as'=>'results.classes', 'uses'=>'ResultsController@classes']);
Route::get('/classes/{classeId}/student{student}/results',  ['as'=>'results.student', 'uses'=>'ResultsController@student']);
Route::post('/classes/{id}/subjects/{subjectId}/result',  ['as'=>'results.store', 'uses'=>'ResultsController@store']);

Route::resource('/results', 'ResultsController');


Route::post('/scores',  ['as'=>'score.store', 'uses'=>'ScoreController@store']);
Route::get('/student/{id}/classe/{classeId}/subject/{subjectId}/score', ['as'=>'scores.show', 'uses'=>'ScoreController@show']);


Route::resource('admins', 'Admin\AdminController');

Route::controllers([
  'account' => 'Auth\AuthController',
  'password' => 'Auth\PasswordController',
]);
