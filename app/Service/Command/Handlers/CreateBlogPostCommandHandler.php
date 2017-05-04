<?php

namespace Blog\Service\Command\Handlers;

use Blog\Domain\Models\Post;
use Blog\Service\Command\CreateBlogPostCommand;
use Carbon\Carbon;

/**
 * Class CreateNewBlogPostCommandHandler
 *
 * @package Blog\Service\Command\Handlers
 */
class CreateBlogPostCommandHandler
{
    /**
     * @param CreateBlogPostCommand $command
     *
     * @return Post
     */
    public function handle(CreateBlogPostCommand $command): Post
    {
        /** @var Post $post */
        $post = $command->getUser()->posts()->create([
            'title' => $command->title,
            'slug' => $command->slug,
            'body' => $command->body,
            'published_at' => $command->published ? Carbon::now() : null
        ]);

        return $post;

        // Could easily send a confirmation email here if required
    }
}