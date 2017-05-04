<?php

namespace Blog\Service\Command\Handlers;

use Blog\Domain\Models\Post;
use Blog\Domain\Posts\Repository;
use Blog\Service\Command\GetPostCommand;

/**
 * Class GetPostCommandHandler
 *
 * @package Blog\Service\Command\Handlers
 */
class GetPostCommandHandler
{
    /**
     * @var Repository
     */
    private $postRepository;

    /**
     * GetPostCommandHandler constructor.
     *
     * @param Repository $postRepository
     */
    public function __construct(Repository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * @param GetPostCommand $command
     *
     * @return Post|null
     */
    public function handle(GetPostCommand $command): ?Post
    {
        return $this->postRepository->getPostByUserAndSlug($command->getUser(), $command->getSlug());
    }
}