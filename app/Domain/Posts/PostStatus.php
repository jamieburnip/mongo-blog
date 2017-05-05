<?php

namespace Blog\Domain\Posts;

use MyCLabs\Enum\Enum;

/**
 * @method static PostStatus Published()
 * @method static PostStatus Draft()
 */
class PostStatus extends Enum implements \JsonSerializable
{
    const Published = 'PUBLISHED';
    const Draft = 'DRAFT';

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): string
    {
        return $this->__toString();
    }
}
