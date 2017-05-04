<?php

namespace Blog\Service\Command\Handlers;

use Blog\Domain\Posts\Repository;
use Blog\Service\Command\ListPostsCommand;

class ListPostsCommandHandler
{
    private $postRepository;

    public function __construct(Repository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function handle(ListPostsCommand $command)
    {
        return $this->postRepository->getPaginatedPostsByUser($command->getUser(), $command->getPages());
    }
}