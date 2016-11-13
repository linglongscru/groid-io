<?php

namespace Groid;

use Illuminate\Database\Eloquent\Model;

/**
 * Groid\SeedCompany
 *
 * @property integer $id
 * @property string $name
 * @property string $ucpc
 * @property string $description
 * @property string $image
 * @property string $url
 * @property string $cannabis_reports_link
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Groid\Strain[] $strains
 * @method static \Illuminate\Database\Query\Builder|\Groid\SeedCompany whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\SeedCompany whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\SeedCompany whereUcpc($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\SeedCompany whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\SeedCompany whereImage($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\SeedCompany whereUrl($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\SeedCompany whereCannabisReportsLink($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\SeedCompany whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\SeedCompany whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SeedCompany extends Model
{
    /**
     * @var string
     */
    protected $table = 'seed_companies';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'ucpc',
        'description',
        'cannabis_reports_link',
        'url',
        'image'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function strains()
    {
        return $this->hasMany('Groid\Strain');
    }
}
