<?php

declare(strict_types=1);

namespace Riot\Collection;

use Ramsey\Collection\AbstractCollection;
use Riot\DTO\IncidentDTO;

final class IncidentDTOCollection extends AbstractCollection
{
    /**
     * @codeCoverageIgnore
     */
    public function getType(): string
    {
        return IncidentDTO::class;
    }

    /**
     * @param array<array<string, mixed>> $data
     */
    public static function createFromArray(array $data): self
    {
        $collection = new self();
        foreach ($data as $item) {
            $collection->add(IncidentDTO::createFromArray($item));
        }

        return $collection;
    }
}
