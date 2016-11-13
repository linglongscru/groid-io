<?php

namespace Groid;

use Illuminate\Database\Eloquent\Model;

/**
 * Groid\Stage
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $cycle_id
 * @property string $name
 * @property string $description
 * @property string $start_date
 * @property string $end_date
 * @property string $lighting
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Groid\Cycle $cycles
 * @property-read \Illuminate\Database\Eloquent\Collection|\Groid\Plant[] $plants
 * @method static \Illuminate\Database\Query\Builder|\Groid\Stage whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Stage whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Stage whereCycleId($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Stage whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Stage whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Stage whereStartDate($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Stage whereEndDate($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Stage whereLighting($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Stage whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Stage whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Stage extends Model
{
    /**
     * @var string
     */
    protected $table = 'stages';

    /**
     * @var array
     */
    protected $fillable = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cycles()
    {
        return $this->belongsTo('Groid\Cycle');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function plants()
    {
        return $this->hasMany('Groid\Plant');
    }
}
