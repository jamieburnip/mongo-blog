<?php

namespace Blog\Domain\Models;

use Blog\Framework\Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;

/**
 * Class User
 *
 * @package Blog\Domain\Models
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * @var string
     */
    protected $table = 'user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * @return string
     */
    public function getUsernameAttribute(): string
    {
        return "@{$this->attributes['username']}";
    }

    /**
     * Return the users avatar.
     *
     * @return string
     */
    public function getAvatar(): string
    {
        $hash = md5(strtolower(trim($this->attributes['email'])));

        return "http://www.gravatar.com/avatar/{$hash}?s=96&d=mm&r=g";
    }

    /**
     * @return int
     */
    public function getTotalPostCount(): int
    {
        return $this->posts()->count();
    }

    /**
     * @return int
     */
    public function getPublishedPostCount(): int
    {
        return $this->posts()
            ->where('published_at', '!=', null)
            ->where('published_at', '<=', Carbon::now())
            ->count();
    }

    /**
     * @return int
     */
    public function getDraftPostCount(): int
    {
        return $this->posts()
            ->where('published_at', null)
            ->count();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
