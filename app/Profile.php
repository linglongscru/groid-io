<?php
namespace Groid;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Groid\Profile
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $avatar
 * @property string $real_name
 * @property string $screen_name
 * @property string $website
 * @property string $twitter
 * @property string $facebook
 * @property string $youtube
 * @property string $instagram
 * @property string $google
 * @property string $github
 * @property string $phone
 * @property string $address
 * @property string $apt_unit
 * @property string $city
 * @property string $postal_code
 * @property string $country_code
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Groid\User $users
 * @method static \Illuminate\Database\Query\Builder|\Groid\Profile whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Profile whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Profile whereAvatar($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Profile whereRealName($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Profile whereScreenName($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Profile whereWebsite($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Profile whereTwitter($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Profile whereFacebook($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Profile whereYoutube($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Profile whereInstagram($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Profile whereGoogle($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Profile whereGithub($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Profile wherePhone($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Profile whereAddress($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Profile whereAptUnit($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Profile whereCity($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Profile wherePostalCode($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Profile whereCountryCode($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Profile whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Profile whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Profile extends Eloquent {

    /**
     * @var string
     */
    protected $table = 'profiles';

    /**
     * @var array
     */
    protected $fillable = [
        'avatar',
        'real_name',
        'screen_name',
        'website',
        'twitter',
        'facebook',
        'youtube',
        'google',
        'github',
        'instagram',
        'phone',
        'address',
        'apt_unit',
        'city',
        'postal_code',
        'country_code',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function users()
    {
        return $this->belongsTo('Groid\User');
    }
}