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
Route::get('/kategoria/{categorySelected}', 'TutorialController@gallery')->name('showGallery');

//Komentarz
Route::get('/usunKomentarz/{id}', 'CommentController@destroy')->name('destroyComment')->middleware('auth');
Route::post('dodajKomentarz', 'CommentController@store')->name('storeComment');

//Poradnik
Route::get('/stworzPoradnik', 'TutorialController@create')->name('createTutorial')->middleware('auth');
Route::get('/poradnik/{id}', 'TutorialController@show')->name('showTutorial');
Route::get('/poradnik/edytuj/{id}', 'TutorialController@edit')->name('editTutorial')->middleware('auth');
Route::get('/usunPoradnik/{id}', 'TutorialController@destroy')->name('destroyTutorial')->middleware('auth');
Route::post('edytujPoradnik/{id}', 'TutorialController@update')->name('updateTutorial');
Route::post('dodajPoradnik', 'TutorialController@store')->name('storeTutorial');

//Profil
Route::get('/uzytkownik/{id}', 'ProfileController@show')->name('showProfile');
Route::get('/edytujProfil/{id}', 'ProfileController@edit')->name('editProfile')->middleware('auth');
Route::post('edytujProfil', 'ProfileController@update')->name('updateProfile');

//Ustawienia
Route::get('/ustawienia', 'ChangePasswordController@index')->name('settings')->middleware('auth');
Route::post('zmienHaslo', 'ChangePasswordController@store')->name('changePassword');

//Wyszukiwanie
Route::get('szukaj', 'TutorialController@searchEdit')->name('searchEdit');
Route::get('wyszukiwanie/{keyword}', 'TutorialController@search');
Route::post('wyszukiwanie', 'TutorialController@searchForm')->name('searchTutorial');

//Ulubione
Route::get('/dodajDoUlubionych/{id}', 'FavouriteController@add')->name('addFavourite')->middleware('auth');
Route::get('ulubione', 'FavouriteController@index')->name('showFavourite')->middleware('auth');
Route::get('/usunZUlubionych/{id}', 'FavouriteController@destroy')->name('destroyFavourite')->middleware('auth');

//Administrator
Route::get('/uzytkownicy', 'AdminController@users')->name('showUsers')->middleware('auth:admin');
Route::get('/komentarze', 'AdminController@comments')->name('showComments')->middleware('auth:admin');
Route::get('/poradniki', 'AdminController@tutorials')->name('showTutorials')->middleware('auth:admin');
Route::get('/usunPoradnikAdmin/{id}', 'AdminController@destroyTutorial')->name('destroyTutorialAdmin')->middleware('auth:admin');
Route::get('/usunKomentarzAdmin/{id}', 'AdminController@destroyComment')->name('destroyCommentAdmin')->middleware('auth:admin');
Route::get('/usunUzytkownikaAdmin/{id}', 'AdminController@destroyUser')->name('destroyUserAdmin')->middleware('auth:admin');
Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
Route::post('/login/admin', 'Auth\LoginController@adminLogin');

Auth::routes();