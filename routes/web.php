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
    // 登入、登出
    Route::get('/signIn', 'SignInController@index');
    Route::post('/signIn', 'SignInController@signIn');
    Route::post('/signOut', 'SignInController@signOut')->name('signOut');
    // 註冊
    Route::get('/signUp', 'SignUpController@index');
    Route::post('/signUp', 'SignUpController@signUp');
    // 接收帳號驗證信、重新寄送、驗證結果
    Route::get('/userVerification/{user_id}/{token}', 'VerifyController@get');
    Route::post('/userVerification', 'VerifyController@resend');
    Route::get('/userVerification', 'VerifyController@index')->name('userVerification');
    // 忘記密碼、寄送重設密碼信
    Route::get('/forgetPassword', 'ResetPasswordController@index');
    Route::post('/forgetPassword', 'ResetPasswordController@sendResetPasswordEmail');
    // 接收重設密碼信、重設密碼、重設結果
    Route::get('/resetPassword/{user_id}/{token}', 'ResetPasswordController@get');
    Route::post('/resetPassword', 'ResetPasswordController@reset');
    Route::get('/resetPassword', 'VerifyController@index')->name('userVerification');
    // 個人資訊
    Route::get('/profile', 'UserProfileController@index');
    Route::post('/profile', 'UserProfileController@updateProfile');
    Route::get('/profile/updatePassword', 'UserProfileController@showUpdatePassword');
    Route::post('/profile/updatePassword', 'UserProfileController@updatePassword');
    Route::get('/profile/updateEmail', 'UserProfileController@showUpdateEmail');
    Route::post('/profile/updateEmail', 'UserProfileController@updateEmail');
    // 線上報名
    Route::resource('registration/onlineRegister', 'OnlineRegisterController');
});
