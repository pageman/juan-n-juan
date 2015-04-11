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

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
    'users'     => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

Route::group(['prefix' => 'oauth'], function () {
    Route::get('facebook', 'CoreProc\JuanNJuan\Http\Controllers\OAuthController@redirectToProvider');
    Route::get('callback', 'CoreProc\JuanNJuan\Http\Controllers\OAuthController@handleProviderCallback');
});
