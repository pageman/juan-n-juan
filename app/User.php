<?php namespace CoreProc\JuanNJuan;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

/**
 * CoreProc\JuanNJuan\User
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Channels[] $channels
 * @method static \Illuminate\Database\Query\Builder|\CoreProc\JuanNJuan\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\CoreProc\JuanNJuan\User whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\CoreProc\JuanNJuan\User whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\CoreProc\JuanNJuan\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\CoreProc\JuanNJuan\User whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\CoreProc\JuanNJuan\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\CoreProc\JuanNJuan\User whereUpdatedAt($value)
 * @property-read \CoreProc\JuanNJuan\UserProfile $userProfile 
 */
class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

    public function channels() {
        return $this->belongsToMany('Channels');
    }

    public function userProfile() {
        return $this->hasOne('CoreProc\JuanNJuan\UserProfile');
    }
}
