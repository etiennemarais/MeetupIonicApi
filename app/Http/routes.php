<?php

Route::get('/', 'WelcomeController@index');
Route::get('/questions', 'WelcomeController@getQuestions');
Route::post('/answers', 'WelcomeController@postAnswers');

Route::post('login', 'AuthController@postLogin');
Route::post('logout', 'AuthController@postLogout');
