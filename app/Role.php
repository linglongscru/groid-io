<?php
namespace Groid;

use Illuminate\Database\Eloquent\Model;

/**
 * Groid\Role
 *
 * @property integer $id
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection|\Groid\User[] $users
 * @method static \Illuminate\Database\Query\Builder|\Groid\Role whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Role whereName($value)
 * @mixin \Eloquent
 */
class Role extends Model
{
    /**
     * @var string
     */
    protected $table = 'roles';

    /**
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany('Groid\User');
    }
}