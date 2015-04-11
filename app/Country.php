<?php namespace CoreProc\JuanNJuan;

use Illuminate\Database\Eloquent\Model;

/**
 * CoreProc\JuanNJuan\Country
 *
 * @property integer $id
 * @property string $capital
 * @property string $citizenship
 * @property string $country_code
 * @property string $currency
 * @property string $currency_code
 * @property string $currency_sub_unit
 * @property string $full_name
 * @property string $iso_3166_2
 * @property string $iso_3166_3
 * @property string $name
 * @property string $region_code
 * @property string $sub_region_code
 * @property boolean $eea
 * @property string $calling_code
 * @method static \Illuminate\Database\Query\Builder|\CoreProc\JuanNJuan\Country whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\CoreProc\JuanNJuan\Country whereCapital($value)
 * @method static \Illuminate\Database\Query\Builder|\CoreProc\JuanNJuan\Country whereCitizenship($value)
 * @method static \Illuminate\Database\Query\Builder|\CoreProc\JuanNJuan\Country whereCountryCode($value)
 * @method static \Illuminate\Database\Query\Builder|\CoreProc\JuanNJuan\Country whereCurrency($value)
 * @method static \Illuminate\Database\Query\Builder|\CoreProc\JuanNJuan\Country whereCurrencyCode($value)
 * @method static \Illuminate\Database\Query\Builder|\CoreProc\JuanNJuan\Country whereCurrencySubUnit($value)
 * @method static \Illuminate\Database\Query\Builder|\CoreProc\JuanNJuan\Country whereFullName($value)
 * @method static \Illuminate\Database\Query\Builder|\CoreProc\JuanNJuan\Country whereIso31662($value)
 * @method static \Illuminate\Database\Query\Builder|\CoreProc\JuanNJuan\Country whereIso31663($value)
 * @method static \Illuminate\Database\Query\Builder|\CoreProc\JuanNJuan\Country whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\CoreProc\JuanNJuan\Country whereRegionCode($value)
 * @method static \Illuminate\Database\Query\Builder|\CoreProc\JuanNJuan\Country whereSubRegionCode($value)
 * @method static \Illuminate\Database\Query\Builder|\CoreProc\JuanNJuan\Country whereEea($value)
 * @method static \Illuminate\Database\Query\Builder|\CoreProc\JuanNJuan\Country whereCallingCode($value)
 */
class Country extends Model {

	protected $visible = ['id', 'name'];

}
