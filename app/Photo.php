<?php

namespace Groid;

use Illuminate\Database\Eloquent\Model;

/**
 * Groid\Photo
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $photo
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Groid\User $users
 * @property-read \Illuminate\Database\Eloquent\Collection|\Groid\Journal[] $journals
 * @property-read \Illuminate\Database\Eloquent\Collection|\Groid\Data[] $data
 * @method static \Illuminate\Database\Query\Builder|\Groid\Photo whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Photo whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Photo wherePhoto($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Photo whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Photo whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Photo extends Model
{
    /**
     * @var string
     */
    protected $table = 'photos';

    /**
     * @var array
     */
    protected $fillable = ['photo', 'user_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function users()
    {
        return $this->belongsTo('Groid\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function journals()
    {
        return $this->belongsToMany('Groid\Journal');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function data()
    {
        return $this->belongsToMany('Groid\Data');
    }
}
