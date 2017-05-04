<?php

namespace Blog\Domain\Posts;

use Blog\Domain\Models\Post;
use Blog\Domain\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class MongoDbRepository implements Repository
{
    /**
     * @inheritdoc
     */
    public function getAllPublishedPosts(): LengthAwarePaginator
    {
        return Post::where('published_at', '!=', 'NULL')
            ->where('published_at', '<=', Carbon::now())
            ->orderBy('published_at', 'desc')
            ->paginate();
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
        return $user->posts()->where('slug', $slug)->first();
    }

    public function getPaginatedPostsByUser(User $user, ?int $pages): LengthAwarePaginator
    {
        return $user->posts()->latest()->paginate($pages);
    }

    /**
     * @inheritdoc
     */
    public function getPostBySlug(string $postId): Post
    {
        dd(Post::find($postId)->get());
    }

    /**
     * @inheritdoc
     */
    public function destroyPostById(string $postId): bool
    {
        return Post::destroy($postId);
    }
}
