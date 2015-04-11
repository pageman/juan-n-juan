<?php namespace CoreProc\JuanNJuan;

use Illuminate\Database\Eloquent\Model;

/**
 * CoreProc\JuanNJuan\UserProfile
 *
 * @property integer $id 
 * @property string $first_name 
 * @property string $last_name 
 * @property integer $user_id 
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 * @method static \Illuminate\Database\Query\Builder|\CoreProc\JuanNJuan\UserProfile whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\CoreProc\JuanNJuan\UserProfile whereFirstName($value)
 * @method static \Illuminate\Database\Query\Builder|\CoreProc\JuanNJuan\UserProfile whereLastName($value)
 * @method static \Illuminate\Database\Query\Builder|\CoreProc\JuanNJuan\UserProfile whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\CoreProc\JuanNJuan\UserProfile whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\CoreProc\JuanNJuan\UserProfile whereUpdatedAt($value)
 */
class UserProfile extends Model {

	protected $hidden = ['id', 'updated_at', 'created_at', 'user_id'];

}
