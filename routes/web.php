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

Route::get('/usunPoradnik/{id}', 'TutorialController@destroy')->name('deleteTutorial')->middleware('auth');
Route::get('/usunKomentarz/{id}', 'CommentController@destroy')->name('deleteComment')->middleware('auth');
Route::get('/edytujProfil/{id}', 'ProfileController@edit')->name('showEditProfile')->middleware('auth');
Route::get('/poradnik/{id}', 'TutorialController@show')->name('showTutorial');
Route::get('/poradnik/edytuj/{id}', 'TutorialController@edit')->name('showEditTutorial')->middleware('auth');
Route::get('/uzytkownik/{id}', 'ProfileController@show')->name('showProfile');

Route::get('/stworzPoradnik', 'TutorialController@create')->name('createTutorial')->middleware('auth');
Route::get('/profil', 'ProfileController@profile')->name('profile')->middleware('auth');
Route::get('/ustawienia', 'HomeController@settings')->name('settings')->middleware('auth');

Route::post('zmienHaslo', 'ChangePasswordController@store')->name('changePassword');
Route::post('dodajPoradnik', 'TutorialController@store')->name('addTutorial');
Route::post('dodajKomentarz', 'CommentController@store')->name('addComment');
Route::post('edytujProfil', 'ProfileController@update')->name('editProfile');
Route::post('edytujPoradnik/{id}', 'TutorialController@update')->name('editTutorial');

Route::resource('categories', 'CategoryController');
Route::resource('profiles', 'ProfileController');
Route::resource('comments', 'CommentController');
Route::resource('tutorials', 'TutorialController');

Auth::routes();
