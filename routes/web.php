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


Route::get('/', 'TutorialController@index')->name('home');

Route::get('/create', 'TutorialController@create')->name('createTutorial')->middleware('auth');
Route::get('/show/{id}', 'TutorialController@show')->name('showTutorial');
Route::get('/delete/{id}', 'TutorialController@destroy')->name('deleteTutorial')->middleware('auth');
Route::get('/deleteComment/{id}', 'CommentController@destroy')->name('deleteComment')->middleware('auth');

Route::get('/settings', 'HomeController@settings')->name('settings')->middleware('auth');

Route::get('/editProfile/{id}', 'ProfileController@index')->name('editProfile')->middleware('auth');
Route::get('/showProfile/{id}', 'ProfileController@show')->name('showProfile');
Route::get('/profile', 'ProfileController@profile')->name('profile')->middleware('auth');


Route::resource('profiles', 'ProfileController');
Route::resource('comments', 'CommentController');
Route::resource('tutorials', 'TutorialController');

Auth::routes();
