<?php

namespace Blog\Service\Command\Handlers;

use Blog\Domain\Models\Post;
use Blog\Service\Command\UpdatePostCommand;
use Carbon\Carbon;

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

        if ($command->published) {
            $post->published_at = Carbon::now();
        }

        $post->save();

        return $post;
    }
}