<?php namespace CoreProc\JuanNJuan\Http\Controllers\Api;

use CoreProc\JuanNJuan\Http\Requests;
use CoreProc\JuanNJuan\Http\Controllers\Controller;

use Illuminate\Http\Request;
use CoreProc\JuanNJuan\Country;

class CountryController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return Country::all();
	}
}
