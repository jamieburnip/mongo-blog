<?php

namespace Blog\Domain\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

/**
 * Class Post
 *
 * @package Blog\Domain\Models
 */
class Post extends Eloquent
{
    protected $table = 'post';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'body',
        'published_at',
    ];

    protected $dates = [
        'published_at'
    ];

    /**
     * Return the users avatar.
     *
     * @return string
     */
    public function getSnippet()
    {
        return substr(strip_tags($this->attributes['body']), 0, 250) . '...';
    }

    public function isPublished()
    {
        return null !== $this->published_at;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
