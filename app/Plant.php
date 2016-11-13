<?php

namespace Groid;

use Illuminate\Database\Eloquent\Model;

/**
 * Groid\Plant
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $cycle_id
 * @property integer $strain_id
 * @property string $source
 * @property boolean $from_seed
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Groid\Strain $strain
 * @method static \Illuminate\Database\Query\Builder|\Groid\Plant whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Plant whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Plant whereCycleId($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Plant whereStrainId($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Plant whereSource($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Plant whereFromSeed($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Plant whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Plant whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Plant extends Model
{
    /**
     * @var string
     */
    protected $table = 'plants';

    /**
     * @var array
     */
    protected $fillable = ['source', 'from_seed'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function strain()
    {
        return $this->hasOne('Groid\Strain');
    }

}
