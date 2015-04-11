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

Route::group(['middleware' => 'auth'], function() {
    Route::get('channels', 'DefaultViewController@viewChannels');
    Route::get('session/{sessionId}', 'DefaultViewController@viewSession');
});


Route::controllers([
    'auth'     => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

Route::group(['prefix' => 'oauth', 'middleware' => 'guest'], function () {
    Route::get('facebook', 'OAuthController@redirectToFacebookProvider');
    Route::get('facebook/callback', 'OAuthController@handleProviderFacebookCallback');
    Route::get('twitter', 'OAuthController@redirectToTwitterProvider');
    Route::get('twitter/callback', 'OAuthController@handleProviderTwitterCallback');
});



Route::group(['prefix' => 'api'], function () {
    Route::get('channels/list', 'Api\ChannelController@all');
    Route::group(['prefix' => 'channels', 'middleware' => 'auth'], function () {
        Route::get('', 'Api\ChannelController@index');
        Route::post('', 'Api\ChannelController@create');
        Route::delete('{id}', 'Api\ChannelController@remove');
    });

    Route::group(['prefix' => 'users', 'middleware' => 'auth'], function () {
        Route::get('me', 'Api\UserController@me');
        Route::get('{id}', 'Api\UserController@show');
    });

    Route::get('countries', 'Api\CountryController@index');
});


