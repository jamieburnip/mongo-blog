<?php

namespace Blog\Service\Command\Handlers;

use Blog\Domain\Models\Post;
use Blog\Service\Command\PublishBlogPostCommand;
use Carbon\Carbon;

/**
 * Class PublishNewBlogPostCommandHandler
 *
 * @package Blog\Service\Command\Handlers
 */
class PublishBlogPostCommandHandler
{
    /**
     * @param PublishBlogPostCommand $command
     *
     * @return Post
     */
    public function handle(PublishBlogPostCommand $command): Post
    {
        $post = Post::find($command->id);

        $post->published_at = Carbon::now();

        $post->save();

        return $post;
    }
}