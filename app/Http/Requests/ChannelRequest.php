<?php namespace CoreProc\JuanNJuan\Http\Requests;

use Auth;

class ChannelRequest extends Request {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (Auth::check()) {
            return true;
        }

        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'     => 'required',
            'desc'     => 'max:255',
            'password' => 'max:255',
            'peer_key' => 'max:255'
        ];
    }

}
