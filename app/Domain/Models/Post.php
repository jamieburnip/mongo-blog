<?php

namespace Blog\Domain\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Post extends Eloquent
{
    public function user()
    {
        return $this->belongsTo('User');
    }
}
