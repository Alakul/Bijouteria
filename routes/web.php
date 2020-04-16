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
Route::get('/kategoria/{categorySelected}', 'TutorialController@gallery')->name('showGallery'); //ERROR

//Komentarz
Route::get('/usunKomentarz/{id}', 'CommentController@destroy')->name('destroyComment')->middleware('auth');

//Poradnik
Route::get('/stworzPoradnik', 'TutorialController@create')->name('createTutorial')->middleware('auth');
Route::get('/poradnik/{id}', 'TutorialController@show')->name('showTutorial');
Route::get('/poradnik/edytuj/{id}', 'TutorialController@edit')->name('editTutorial')->middleware('auth');
Route::get('/usunPoradnik/{id}', 'TutorialController@destroy')->name('destroyTutorial')->middleware('auth');

//Profil
Route::get('/profil', 'ProfileController@profile')->name('profile')->middleware('auth');
Route::get('/uzytkownik/{id}', 'ProfileController@show')->name('showProfile');
Route::get('/edytujProfil/{id}', 'ProfileController@edit')->name('editProfile')->middleware('auth');

//Ustawienia
Route::get('/ustawienia', 'ChangePasswordController@index')->name('settings')->middleware('auth');

//Ulubione
Route::get('dodajDoUlubionych/{id}', 'FavouriteController@add')->name('addFavourite');
Route::get('ulubione', 'FavouriteController@index')->name('showFavourite')->middleware('auth');
Route::get('/usunZUlubionych/{id}', 'FavouriteController@destroy')->name('destroyFavourite')->middleware('auth');

Route::post('zmienHaslo', 'ChangePasswordController@store')->name('changePassword');
Route::post('dodajPoradnik', 'TutorialController@store')->name('storeTutorial');
Route::post('dodajKomentarz', 'CommentController@store')->name('storeComment');
Route::post('edytujProfil', 'ProfileController@update')->name('updateProfile');
Route::post('edytujPoradnik/{id}', 'TutorialController@update')->name('updateTutorial');
Route::post('szukaj', 'TutorialController@search')->name('searchTutorial');



Route::resource('categories', 'CategoryController');
Route::resource('profiles', 'ProfileController');
Route::resource('comments', 'CommentController');
Route::resource('tutorials', 'TutorialController');


Auth::routes();
