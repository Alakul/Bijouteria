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
Route::get('/', function () {
    return view('pages/home');
});

Route::get('/tutorial', function () {
    return view('pages/showTutorial');
});

Route::get('/addTutorial', 'HomeController@addTutorial');
Route::post('titleImageUpload', 'HomeController@titleImageUpload')->name('image.upload.post');


Auth::routes();
