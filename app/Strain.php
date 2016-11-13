<?php

namespace Groid;

use Illuminate\Database\Eloquent\Model;

/**
 * Groid\Strain
 *
 * @property integer $id
 * @property string $name
 * @property string $image
 * @property string $lineage
 * @property string $genetics
 * @property string $seed_company
 * @property string $description
 * @property string $url
 * @property string $qr
 * @property string $cannabis_reports_link
 * @property integer $flowering_time_min
 * @property integer $flowering_time_max
 * @property string $ucpc
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Groid\Plant[] $plants
 * @property-read \Groid\SeedCompany $seedCompanies
 * @method static \Illuminate\Database\Query\Builder|\Groid\Strain whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Strain whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Strain whereImage($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Strain whereLineage($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Strain whereGenetics($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Strain whereSeedCompany($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Strain whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Strain whereUrl($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Strain whereQr($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Strain whereCannabisReportsLink($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Strain whereFloweringTimeMin($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Strain whereFloweringTimeMax($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Strain whereUcpc($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Strain whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Strain whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Strain extends Model
{
    /**
     * @var string
     */
    protected $table = 'strains';

    /**
     * @var array
     */
    protected $fillable = [
        'cannabis_reports_link', 'name', 'lineage', 'genetics', 'description', 'seed_company',
        'flowering_time_min', 'flowering_time_max', 'ucpc', 'image'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function plants()
    {
        return $this->belongsToMany('Groid\Plant');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function seedCompanies()
    {
        return $this->belongsTo('Groid\SeedCompany');
    }
}
