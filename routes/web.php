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

Route::get('/', 'HomeController@index')->name('home');
// Auth
Route::get('/login', ['as' => 'login', 'uses' => 'SigninController@index']);
Route::get('/register', ['as' => 'register', 'uses' => 'SignupController@index']);
Route::post('/register', 'SignupController@create');
Route::post('/login', 'SigninController@create');
Route::post('/checkusername','SignupController@checkusername');
Route::post('/checkemail','SignupController@checkemail');
Route::get('/logout', 'SigninController@destroy');
Route::get('auth/{provider}', 'AuthController@redirectToProvider');
Route::get('auth/{provider}/callback', 'AuthController@handleProviderCallback');

// Other
Route::post('/adduser','HomeController@adduser');
Route::get('/questions', 'QuestionsController@index')->name('questions');
Route::post('/questions', 'QuestionsController@create');
Route::post('/answer', 'QuestionsController@answer');
Route::get('/delete/{id}', 'QuestionsController@delete');
