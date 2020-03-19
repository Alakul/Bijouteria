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
Route::get('/create', 'TutorialController@create')->name('createTutorial');
Route::get('/show/{id}', 'TutorialController@show')->name('showTutorial');
Route::get('/delete/{id}', 'TutorialController@destroy')->name('deleteTutorial');

Route::get('/settings', 'HomeController@settings')->name('settings');

Route::get('/editProfile/{id}', 'ProfileController@index')->name('editProfile');
Route::get('/showProfile/{id}', 'ProfileController@show')->name('showProfile');
Route::get('/profile', 'ProfileController@profile')->name('profile');


Route::resource('profiles', 'ProfileController');
Route::resource('comments', 'CommentController');
Route::resource('tutorials', 'TutorialController');

Auth::routes();
