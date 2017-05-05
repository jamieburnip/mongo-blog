<?php

namespace Blog\Domain\Posts;

use Blog\Domain\Models\Post;
use Blog\Domain\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface Repository
{
    public function getAllPublishedPosts(int $perPage = 15): LengthAwarePaginator;

    public function getPublishedPostsByUser(User $user, int $perPage = 15): LengthAwarePaginator;

    public function getDraftPostsByUser(User $user, int $perPage = 15): LengthAwarePaginator;

    public function getPostsByUser(User $user): Collection;

    public function getPostByUserAndSlug(User $user, string $slug): ?Post;

    public function getPublishedPostByUserAndSlug(User $user, string $slug): ?Post;

    public function getPostById(string $postId): Post;

    public function destroyPostById(string $postId): bool;
}
