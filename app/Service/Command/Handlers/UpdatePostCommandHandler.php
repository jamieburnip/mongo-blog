<?php

namespace Blog\Service\Command\Handlers;

use Blog\Domain\Models\Post;
use Blog\Service\Command\UpdatePostCommand;

/**
 * Class UpdatePostCommandHandler
 *
 * @package Blog\Service\Command\Handlers
 */
class UpdatePostCommandHandler
{
    /**
     * @param UpdatePostCommand $command
     *
     * @return Post
     */
    public function handle(UpdatePostCommand $command): Post
    {
        $post = Post::find($command->id);

        $post->title = $command->title ?: $post->title;
        $post->body = $command->body ?: $post->body;
        $post->published_at = $command->published ?: $post->published_at;

        $post->save();

        return $post;
    }
}