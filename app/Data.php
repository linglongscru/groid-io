<?php

namespace Groid;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Data
 *
 * @package Groid
 * @property integer $id
 * @property integer $cycle_id
 * @property integer $air_temp_c
 * @property integer $co2_ppm
 * @property integer $relative_humidity
 * @property integer $water_temp_c
 * @property integer $water_level
 * @property float $ec
 * @property float $ph
 * @property float $runoff_ec
 * @property float $runoff_ph
 * @property string $notes
 * @property string $time_of_record
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property integer $stage_id
 * @property-read \Groid\Cycle $cycles
 * @property-read \Illuminate\Database\Eloquent\Collection|\Groid\Photo[] $photos
 * @property-read \Groid\Stage $stages
 * @method static \Illuminate\Database\Query\Builder|\Groid\Data whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Data whereCycleId($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Data whereAirTempC($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Data whereCo2Ppm($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Data whereRelativeHumidity($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Data whereWaterTempC($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Data whereWaterLevel($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Data whereEc($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Data wherePh($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Data whereRunoffEc($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Data whereRunoffPh($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Data whereNotes($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Data whereTimeOfRecord($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Data whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Data whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Data whereStageId($value)
 * @mixin \Eloquent
 */
class Data extends Model
{
    /**
     * @var string
     */
    protected $table = 'data';

    /**
     * @var array
     */
    protected $fillable = [
        'cycle_id',
        'stage_id',
        'air_temp_c',
        'co2_ppm',
        'relative_humidity',
        'water_temp_c',
        'water_level',
        'ec',
        'ph',
        'runoff_ec',
        'runoff_ph',
        'notes',
        'time_of_record'
    ];

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
    public function photos()
    {
        return $this->hasMany('Groid\Photo');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function stages()
    {
        return $this->hasOne('Groid\Stage');
    }
}
