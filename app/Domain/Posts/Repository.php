<?php

namespace Blog\Domain\Posts;

use Blog\Domain\Models\Post;
use Blog\Domain\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface Repository
{
    public function getAllPublishedPosts(): LengthAwarePaginator;

    public function getPostsByUser(User $user): Collection;

    public function getPostByUserAndSlug(User $user, string $slug): ?Post;

    public function getPaginatedPostsByUser(User $user, ?int $pages): LengthAwarePaginator;

    public function getPostBySlug(string $postId): Post;

    public function destroyPostById(string $postId): bool;
}
