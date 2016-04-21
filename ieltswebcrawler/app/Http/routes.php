<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
define('GOOGLE_API_KEY','AIzaSyBQqP-t72lNHi7Dy1Or3zUDO1gENy6JBG4');

Route::get('/', function () {
    return view('welcome');
});

Route::get('home', 'IeltsWebcrawler@index');
Route::get('test', 'IeltsWebcrawler@test');

//Route::resource('ielts','IeltsWebcrawler');
/**
Route::resource('ielts', 'IeltsWebcrawler', ['names' => [
    'store' => 'register'
]]);
**/
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/
Route::group(['middleware' => ['web']], function () {
    //
});
