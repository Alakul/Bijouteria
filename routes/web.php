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
Route::get('/profile', 'TutorialController@profile')->name('profile');
Route::get('/create', 'TutorialController@create')->name('create');
Route::get('/show/{id}', 'TutorialController@show')->name('show');
Route::get('/showProfile/{id}', 'TutorialController@showProfile')->name('showProfile');



Route::post('/store', 'CommentController@store')->name('storeComment');



Route::get('/settings', 'HomeController@settings')->name('settings');
Route::get('/editProfile', 'HomeController@editProfile')->name('editProfile');


Route::resource('profiles', 'ProfileController');
Route::resource('comments', 'CommentController');
Route::resource('tutorials', 'TutorialController');

Auth::routes();
