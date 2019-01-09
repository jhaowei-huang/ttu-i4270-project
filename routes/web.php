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

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['web']], function () {
    // 靜態網頁
    Route::get('/', 'PageController@index')->name('index');
    Route::get('/agenda0926', 'PageController@agenda0926')->name('agenda0926');
    Route::get('/agenda0927', 'PageController@agenda0927')->name('agenda0927');
    Route::get('/map', 'PageController@map')->name('map');
    Route::get('/speaker', 'PageController@speaker')->name('speaker');
    Route::get('/registration', 'PageController@registration')->name('registration');
    Route::get('/contact', 'PageController@contact')->name('contact');
    Route::get('/checkAuth', 'PageController@checkAuth')->name('checkAuth');

    Route::get('/signIn', 'SignInController@index');
    Route::post('/signIn', 'SignInController@signIn');
    Route::post('/signOut', 'SignInController@signOut')->name('signOut');

    Route::get('/signUp', 'SignUpController@index');
    Route::post('/signUp', 'SignUpController@signUp');
});
