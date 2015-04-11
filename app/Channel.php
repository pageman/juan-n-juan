<?php namespace CoreProc\JuanNJuan;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model {

    protected $hidden = ['password', 'user_id', 'country_id', 'country'];

	protected $fillable = ['name', 'desc', 'password'];

    protected $appends = ['country_name'];

    public function user() {
        return $this->belongsTo('CoreProc\JuanNJuan\User');
    }

    public function country() {
        return $this->belongsTo('CoreProc\JuanNJuan\Country');
    }

    public function getCountryNameAttribute() {
        return $this->country->name;
    }

}
