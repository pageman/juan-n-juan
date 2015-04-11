<?php namespace CoreProc\JuanNJuan\Http\Controllers\Api;

use Auth;
use CoreProc\JuanNJuan\Channel;
use CoreProc\JuanNJuan\Country;
use CoreProc\JuanNJuan\Http\Controllers\Controller;
use CoreProc\JuanNJuan\Http\Requests;
use CoreProc\JuanNJuan\Services\Error;
use Exception;
use Geocoder;
use Response;

class ChannelController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $channels = Channel::all()->load('user');

        return \Response::json($channels);
    }

    public function create(Requests\ChannelRequest $request)
    {
        try {
            if ($request->has(['latitude', 'longitude'])) {
                $country_code = Geocoder::reverse($request->get('latitude'), $request->get('longitude'))->getCountryCode();
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
            $channel->user_id = Auth::id();
            $channel->fill($request->all());
            $channel->password = bcrypt($channel->password);
            if (isset($country_code)) {
                $channel->country_id = Country::where('country_code', $country_code)->first()->id;
            }
            $channel->save();
        } catch (Exception $e) {
            return Error::response($e);
        }

        return Response::json([
            'ok' => $channel->load('user')
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
            Channel::destroy($id);
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