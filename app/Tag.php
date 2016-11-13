<?php

namespace Groid;

use Illuminate\Database\Eloquent\Model;

/**
 * Groid\Tag
 *
 * @property integer $id
 * @property string $tag
 * @property-read \Illuminate\Database\Eloquent\Collection|\Groid\Photo[] $photos
 * @property-read \Illuminate\Database\Eloquent\Collection|\Groid\Data[] $data
 * @property-read \Illuminate\Database\Eloquent\Collection|\Groid\Journal[] $journals
 * @method static \Illuminate\Database\Query\Builder|\Groid\Tag whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Groid\Tag whereTag($value)
 * @mixin \Eloquent
 */
class Tag extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['tag'];
    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function photos() {
        return $this->belongsToMany('Groid\Photo', 'photo_tag');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function data() {
        return $this->belongsToMany('Groid\Data', 'data_tag');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function journals() {
        return $this->belongsToMany('Groid\Journal', 'journal_tag');
    }
}
