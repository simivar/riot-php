<?php

declare(strict_types=1);

namespace Riot\Collection;

use Ramsey\Collection\AbstractCollection;
use Riot\DTO\ContentDTO;

final class ContentDTOCollection extends AbstractCollection
{
    /**
     * @codeCoverageIgnore
     */
    public function getType(): string
    {
        return ContentDTO::class;
    }

    /**
     * @param array<array<string, mixed>> $data
     *
     * @return self<ContentDTO>
     */
    public static function createFromArray(array $data): self
    {
        $collection = new self();
        foreach ($data as $item) {
            $collection->add(ContentDTO::createFromArray($item));
        }

        return $collection;
    }
}
