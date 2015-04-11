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

Route::get('/', 'DefaultViewController@viewHome');

Route::get('session', 'DefaultViewController@viewSession');

Route::controllers([
    'auth'     => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

Route::group(['prefix' => 'oauth'], function () {
    Route::get('facebook', 'OAuthController@redirectToProvider');
    Route::get('callback', 'OAuthController@handleProviderCallback');
});

Route::group(['prefix' => 'api'], function () {
    Route::group(['prefix' => 'channels'], function () {
        Route::get('', 'Api\ChannelController@index');
        Route::post('', 'Api\ChannelController@create');
        Route::get('{id}', 'Api\ChannelController@show');
        Route::delete('{id}', 'Api\ChannelController@remove');
    });
});

Route::group(['prefix' => 'users'], function() {
    Route::get('me', '');
    Route::get('{id}', '');
});
