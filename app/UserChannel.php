<?php namespace CoreProc\JuanNJuan;

use Illuminate\Database\Eloquent\Model;

/**
 * CoreProc\JuanNJuan\UserChannel
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $channel_id
 * @method static \Illuminate\Database\Query\Builder|\CoreProc\JuanNJuan\UserChannel whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\CoreProc\JuanNJuan\UserChannel whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\CoreProc\JuanNJuan\UserChannel whereChannelId($value)
 */
class UserChannel extends Model {

	public $timestamps = false;

}
