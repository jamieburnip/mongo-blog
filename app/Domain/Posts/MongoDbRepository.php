<?php

namespace Blog\Domain\Posts;

use Blog\Domain\Models\Post;
use Blog\Domain\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

/**
 * Class MongoDbRepository
 *
 * @package Blog\Domain\Posts
 */
class MongoDbRepository implements Repository
{
    /**
     * @inheritdoc
     */
    public function getAllPublishedPosts(int $perPage = 15): LengthAwarePaginator
    {
        return Post::where('published_at', '!=', null)
            ->where('published_at', '<=', Carbon::now())
            ->orderBy('published_at', 'desc')
            ->paginate($perPage);
    }

    /**
     * @inheritdoc
     */
    public function getPublishedPostsByUser(User $user, int $perPage = 15): LengthAwarePaginator
    {
        return $user->posts()->where('published_at', '!=', null)
            ->where('published_at', '<=', Carbon::now())
            ->orderBy('published_at', 'desc')
            ->paginate($perPage);
    }

    /**
     * @inheritdoc
     */
    public function getDraftPostsByUser(User $user, int $perPage = 15): LengthAwarePaginator
    {
        return $user->posts()->where('published_at', null)
            ->latest()
            ->paginate($perPage);
    }

    /**
     * @inheritdoc
     */
    public function getPostsByUser(User $user): Collection
    {
        return $user->posts()->get();
    }

    /**
     * @inheritdoc
     */
    public function getPostByUserAndSlug(User $user, string $slug): ?Post
    {
        return $user->posts()->where('slug', $slug)->firstOrFail();
    }

    /**
     * @inheritdoc
     */
    public function getPublishedPostByUserAndSlug(User $user, string $slug): ?Post
    {
        return $user->posts()->where('published_at', '!=', null)
            ->where('published_at', '<=', Carbon::now())
            ->where('slug', $slug)
            ->firstOrFail();
    }

    /**
     * @inheritdoc
     */
    public function getPostById(string $postId): Post
    {
        return Post::find($postId)->first();
    }

    /**
     * @inheritdoc
     */
    public function destroyPostById(string $postId): bool
    {
        return Post::destroy($postId);
    }
}
