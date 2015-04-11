<?php namespace CoreProc\JuanNJuan\Http\Controllers\Api;

use CoreProc\JuanNJuan\Http\Controllers\Controller;
use CoreProc\JuanNJuan\Http\Requests;

use CoreProc\JuanNJuan\User;
use Response;
use Auth;

class UserController extends Controller {

	public function show($id) {
        $user = User::findOrFail($id);
        
        return Response::json($user);
    }

    public function me() {
        return Response::json(Auth::user());
    }
}
