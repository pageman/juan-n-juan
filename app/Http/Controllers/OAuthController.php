<?php namespace CoreProc\JuanNJuan\Http\Controllers;

use Auth;
use CoreProc\JuanNJuan\Http\Requests;
use CoreProc\JuanNJuan\User;
use CoreProc\JuanNJuan\UserProfile;
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

                $user_profile = new UserProfile;
                $user_profile->first_name = $user_social->user['first_name'];
                $user_profile->last_name = $user_social->user['last_name'];
                $user_profile->gender = $user_social->user['gender'];
                $user_profile->avatar = $user_social->avatar;
                $user_profile->link = $user_social->user['link'];
                $user->userProfile()->save($user_profile);
            }

            return redirect('/');
        }

        return redirect('auth/login');
    }

}
