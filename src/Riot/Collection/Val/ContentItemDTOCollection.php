<?php

declare(strict_types=1);

namespace Riot\Collection\Val;

use Ramsey\Collection\AbstractCollection;
use Riot\DTO\Val\ContentItemDTO;

final class ContentItemDTOCollection extends AbstractCollection
{
    /**
     * @codeCoverageIgnore
     */
    public function getType(): string
    {
        return ContentItemDTO::class;
    }

    /**
     * @param array<array<string, mixed>> $data
     *
     * @return self<ContentItemDTO>
     */
    public static function createFromArray(array $data): self
    {
        $collection = new self();
        foreach ($data as $item) {
            $collection->add(ContentItemDTO::createFromArray($item));
        }

        return $collection;
    }
}
