<?php namespace CoreProc\JuanNJuan\Http\Controllers;

use CoreProc\JuanNJuan\Http\Requests;
use CoreProc\JuanNJuan\Http\Controllers\Controller;

use CoreProc\JuanNJuan\User;
use Response;

class UserController extends Controller {

	public function show($id) {
        $user = User::findOrFail($id);
        
        return Response::json($user);
    }

}
