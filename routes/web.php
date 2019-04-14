<?php

use App\Http\Controllers\ContactController;

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

Route::get('/home', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
     return view('contact');
});

Route::get('/messages','ContactController@getMessages');

Route::post('/contact/submit','ContactController@submit');

Route::get('/bestVideos','VideosController@getBestVideos');

Route::get('/trending','VideosController@getVideos');

Route::post('/insertVideoRate','VideosController@insertVideoRate');

Route::post('/insertVideo','VideosController@insertVideo');


        