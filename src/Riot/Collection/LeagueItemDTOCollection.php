<?php

declare(strict_types=1);

namespace Riot\Collection;

use Ramsey\Collection\AbstractCollection;
use Riot\DTO\LeagueItemDTO;

final class LeagueItemDTOCollection extends AbstractCollection
{
    public function getType(): string
    {
        return LeagueItemDTO::class;
    }

    /**
     * @param array<array<string, int|string|bool>> $data
     *
     * @return LeagueItemDTOCollection<LeagueItemDTO>
     */
    public static function createFromArray(array $data): self
    {
        $collection = new self();
        foreach ($data as $item) {
            $collection->add(LeagueItemDTO::createFromArray($item));
        }

        return $collection;
    }
}
