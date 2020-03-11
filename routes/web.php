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


Route::get('/tutorial', function () {
    return view('pages/showTutorial');
});

Route::get('/', 'HomeController@index')->name('home');
Route::get('/create', 'TutorialController@create')->name('create');

Route::resource('tutorials', 'TutorialController');


Auth::routes();
