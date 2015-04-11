<?php namespace CoreProc\JuanNJuan\Http\Controllers;

use Auth;
use CoreProc\JuanNJuan\Http\Requests;
use CoreProc\JuanNJuan\User;
use Socialize;

class OAuthController extends Controller {

    public function redirectToProvider()
    {
        return Socialize::with('facebook')->redirect();
    }

    public function handleProviderCallback()
    {
        if (!Auth::check()) {
            $user_social = Socialize::with('facebook')->user();

            $user = User::where('email', $user_social->getEmail())->first();

            if (isset($user)) {
                Auth::login($user);
            } else {
                $user           = new User;
                $user->email    = $user_social->getEmail();
                $user->name     = $user_social->getName();
                $user->password = bcrypt(str_random());
                $user->save();
            }

            return redirect('/');
        }

        return redirect('auth/login');
    }

}
