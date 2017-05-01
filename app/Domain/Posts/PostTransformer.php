<?php

namespace Blog\Domain\Posts;

use Blog\Domain\Models\Post;
use League\Fractal\TransformerAbstract;

/**
 * Class PodcastTransformer
 *
 * @package Podcast\Domain\Podcast
 */
class PostTransformer extends TransformerAbstract
{
    /**
     * @param Post $post
     *
     * @return array
     */
    public function transform(Post $post): array
    {
        return [
            'id' => $post->id,
            'title' => $post->title,
            'slug' => $post->slug,
            'body' => $post->body,
            'snippet' => substr(strip_tags($post->body), 0, 250) . '...',
            'author' => [
                'name' => $post->user->name,
                'username' => $post->user->username,
            ],
            'created_at' => $post->created_at->toDateTimeString(),
            'created_at_human' => $post->created_at->diffForHumans(),
        ];
    }
}