<?php

namespace Groid;

use Illuminate\Database\Eloquent\Model;

/**
 * Groid\Journal
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $title
 * @property string $body
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Groid\User $user
 * @property-read \Illuminate\Database\Eloquent\Collection|\Groid\Photo[] $photo
 * @method static whereId($value)
 * @method static whereUserId($value)
 * @method static whereTitle($value)
 * @method static whereBody($value)
 * @method static whereCreatedAt($value)
 * @method static whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Journal extends Model
{
    /**
     * @var string
     */
    protected $table = 'journals';

    /**
     * @var array
     */
    protected $fillable = ['user_id', 'title', 'body'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('Groid\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function photo()
    {
        return $this->hasMany('Groid\Photo');
    }
}
