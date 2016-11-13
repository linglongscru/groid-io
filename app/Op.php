<?php

namespace Groid;

use Illuminate\Database\Eloquent\Model;

/**
 * Groid\Op
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $unit_name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $street_address
 * @property string $city
 * @property string $state
 * @property string $zip
 * @property integer $total_area_square_meters
 * @property-read \Groid\User $users
 * @property-read \Illuminate\Database\Eloquent\Collection|\Groid\Cycle[] $cycles
 * @method static \Illuminate\Database\Query\Builder|\Groid\Op whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Op whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Op whereUnitName($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Op whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Op whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Op whereStreetAddress($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Op whereCity($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Op whereState($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Op whereZip($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Op whereTotalAreaSquareMeters($value)
 * @mixin \Eloquent
 */
class Op extends Model
{
    /**
     * @var string
     */
    protected $table = 'ops';

    /**
     * @var array
     */
    protected $fillable = ['unit_name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function users()
    {
        return $this->belongsTo('Groid\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cycles()
    {
        return $this->hasMany('Groid\Cycle');
    }
}
