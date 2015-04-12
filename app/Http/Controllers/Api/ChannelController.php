<?php namespace CoreProc\JuanNJuan\Http\Controllers\Api;

use Auth;
use CoreProc\JuanNJuan\Channel;
use CoreProc\JuanNJuan\Country;
use CoreProc\JuanNJuan\Http\Controllers\Controller;
use CoreProc\JuanNJuan\Http\Requests;
use CoreProc\JuanNJuan\Services\Error;
use Exception;
use Geocoder;
use Request;
use Response;

class ChannelController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $channels = Request::has('country') ?
            Channel::where('country_id', Request::get('country'))->where('user_id', '<>', Auth::id())->get() :
            Channel::where('user_id', '<>', Auth::id())->get();

        return Response::json([
            'ok' => $channels->load(['user.userProfile', 'country'])
        ]);
    }

    public function all()
    {
        return Response::json([
            'ok' => Channel::all()->load(['user.userProfile', 'country'])
        ]);
    }

    public function create()
    {
        try {
            if (Request::has(['latitude', 'longitude'])) {
                $country_code = Geocoder::reverse(Request::get('latitude'), Request::get('longitude'))->getCountryCode();
            } else {
                $country_code = Geocoder::geocode($_SERVER['REMOTE_ADDR'])->getCountryCode();
            }
        } catch (Exception $e) {

        }

        $country_code = @($country_code) ?: 608;

        try {
            $channel = Channel::firstOrNew([
                'user_id' => Auth::id()
            ]);

            $channel->user_id  = Auth::id();
            $channel->name     = Request::get('name');
            $channel->desc     = Request::get('desc');
            $channel->peer_key = Request::get('peer_key');
            $channel->password = bcrypt(Request::get('password'));
            if (isset($country_code)) {
                $channel->country_id = Country::where('country_code', $country_code)->first()->id;
            }
            $channel->save();
        } catch (Exception $e) {
            return Error::response($e);
        }

        return Response::json([
            'ok' => $channel->load(['user.userProfile', 'country'])
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function remove($id)
    {
        try {
            $channel = Channel::findOrFail($id);
            $channel->delete();
        } catch (Exception $e) {
            return Error::response($e);
        }

        return Response::json([
            'ok' => [
                'message' => 'Channel has been successfully deleted'
            ]
        ]);
    }

    public function join($id)
    {

    }

    public function part($id)
    {

    }
}
