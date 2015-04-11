<?php namespace CoreProc\JuanNJuan\Http\Controllers;

use CoreProc\JuanNJuan\Http\Requests;
use CoreProc\JuanNJuan\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Socialize;

class OAuthController extends Controller {

    public function redirectToProvider()
    {
        return Socialize::with('github')->redirect();
    }

    public function handleProviderCallback()
    {
        $user = Socialize::with('github')->user();

        // $user->token;
    }

}
