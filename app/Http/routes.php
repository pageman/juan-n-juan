<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'ViewController@viewHome');

/*
Route::get('home', 'HomeController@index');
*/

Route::controllers([
    'auth'     => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

Route::group(['prefix' => 'oauth'], function () {
    Route::get('facebook', 'OAuthController@redirectToProvider');
    Route::get('callback', 'OAuthController@handleProviderCallback');
});

Route::group(['prefix' => 'api'], function() {
    Route::controller('channels', 'ChannelController');
});
