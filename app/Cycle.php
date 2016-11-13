<?php

namespace Groid;
use Illuminate\Database\Eloquent\Model;

/**
 * Groid\Cycle
 *
 * @property integer $id
 * @property integer $op_id
 * @property string $name
 * @property string $description
 * @property string $start_date
 * @property string $end_date
 * @property string $medium
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Groid\Op $ops
 * @property-read \Illuminate\Database\Eloquent\Collection|\Groid\Stage[] $stages
 * @property-read \Illuminate\Database\Eloquent\Collection|\Groid\Data[] $data
 * @method static \Illuminate\Database\Query\Builder|\Groid\Cycle whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Cycle whereOpId($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Cycle whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Cycle whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Cycle whereStartDate($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Cycle whereEndDate($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Cycle whereMedium($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Cycle whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Cycle whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Cycle extends Model
{
    /**
     * @var string
     */
    protected $table = 'cycles';

    /**
     * @var array
     */
    protected $fillable = [
        'op_id',
        'name',
        'description',
        'start_date',
        'end_date',
        'medium'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ops()
    {
        return $this->belongsTo('Groid\Op');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function stages()
    {
        return $this->hasMany('Groid\Stage');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function data()
    {
        return $this->hasMany('Groid\Data');
    }
}
