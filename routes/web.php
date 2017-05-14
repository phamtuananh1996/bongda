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
    return view('welcome');
});

Route::post('login','c_user@login');

Route::get('login','c_user@getLogin');
Route::get('logout','c_user@logout');
Route::get('notification', function() {
    return view('pages.notification');
});
Route::get('forgotpassword', function() {
    return view('pages.forgotpassword');
});
Route::get('forgotpassword/comfirm','c_user@forgotpasswordComfirm');
Route::post('forgotpassword','c_user@forgotpassword');
Route::post('register','c_user@register');
Route::get('register/comfirm','c_user@registerComfirm');
Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');
Route::post('changepassword', 'c_user@changePassword');
Route::group(['prefix' => '/','middleware'=>'check_login'], function() {
    Route::get('home', function() {
        return view('pages.newsfeed');
    });
    Route::get('profile', 'c_user@proFile');
    Route::get('editprofile', 'c_user@editProfile');
    Route::get('myteam', 'c_user@myteam');
    Route::post('editprofile', 'c_user@postEditprofile');
    Route::post('change_password', 'c_user@change_password');
});

Route::group(['prefix' => 'ajax','middleware'=>'check_login'], function() {
    Route::get('checkemail','c_user@ajaxGetEmail');
     Route::post('checkpass','c_user@ajaxCheckPass');
});

Route::get('404', function() {
   return view('pages.404');
});