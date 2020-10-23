<?php

declare(strict_types=1);

namespace Riot\Collection;

use Ramsey\Collection\AbstractCollection;
use Riot\DTO\MessageDTO;

final class MessageDTOCollection extends AbstractCollection
{
    /**
     * @codeCoverageIgnore
     */
    public function getType(): string
    {
        return MessageDTO::class;
    }

    /**
     * @param array<array<string, array|string>> $data
     */
    public static function createFromArray(array $data): self
    {
        $collection = new self();
        foreach ($data as $item) {
            $collection->add(MessageDTO::createFromArray($item));
        }

        return $collection;
    }
}
