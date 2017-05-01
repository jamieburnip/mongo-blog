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
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'body',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
