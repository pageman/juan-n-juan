<?php namespace CoreProc\JuanNJuan;

use Illuminate\Database\Eloquent\Model;

/**
 * CoreProc\JuanNJuan\Channel
 *
 * @property integer $id
 * @property string $name
 * @property string $desc
 * @property string $password
 * @property integer $country_id
 * @property integer $user_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \CoreProc\JuanNJuan\User $user
 * @property-read \CoreProc\JuanNJuan\Country $country
 * @property-read mixed $country_name
 * @method static \Illuminate\Database\Query\Builder|\CoreProc\JuanNJuan\Channel whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\CoreProc\JuanNJuan\Channel whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\CoreProc\JuanNJuan\Channel whereDesc($value)
 * @method static \Illuminate\Database\Query\Builder|\CoreProc\JuanNJuan\Channel wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\CoreProc\JuanNJuan\Channel whereCountryId($value)
 * @method static \Illuminate\Database\Query\Builder|\CoreProc\JuanNJuan\Channel whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\CoreProc\JuanNJuan\Channel whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\CoreProc\JuanNJuan\Channel whereUpdatedAt($value)
 * @property string $peer_key 
 * @method static \Illuminate\Database\Query\Builder|\CoreProc\JuanNJuan\Channel wherePeerKey($value)
 */
class Channel extends Model {

    protected $hidden = ['password', 'user_id', 'country_id'];

	protected $fillable = ['name', 'desc', 'password'];

    public function user() {
        return $this->belongsTo('CoreProc\JuanNJuan\User');
    }

    public function country() {
        return $this->belongsTo('CoreProc\JuanNJuan\Country');
    }
}
