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
    Route::get('home', 'c_home@home');
    Route::get('profile', 'c_user@proFile');
    Route::get('editprofile', 'c_user@editProfile');
    Route::get('myclub', 'c_club@myteam');
    Route::post('editprofile', 'c_user@postEditprofile');
    Route::post('change_password', 'c_user@change_password');
    Route::get('profile/{id}', 'c_user@profile_friend');
    Route::post('post','c_post@post');
    Route::get('createClub', 'c_club@createClub');
    Route::post('post_create_club','c_club@postCreateClub');

    Route::get('clubdetail/{id}', 'c_club@clubDetail');
});
 Route::get('ajax/checkemail','c_user@ajaxGetEmail');
Route::group(['prefix' => 'ajax','middleware'=>'check_login'], function() {
   
    Route::post('checkpass','c_user@ajaxCheckPass');

    Route::post('getposition','c_user@ajaxCheckposition');

    Route::post('like','c_like@ajaxLike');
    Route::post('post','c_like@ajaxDislike');

    Route::post('comment','c_comment@ajaxComment');

    Route::get('home', 'c_post@ajaxData');

     Route::post('postImage', 'c_user@postImage');

    Route::post('getdistrict', 'c_club@ajaxGetDistrict');

     Route::post('getward', 'c_club@ajaxGetWard');
});

Route::get('404', function() {
   return view('pages.404');
});