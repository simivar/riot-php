<?php

declare(strict_types=1);

namespace Riot\Collection;

use Ramsey\Collection\AbstractCollection;
use Riot\DTO\BannedChampionDTO;

final class BannedChampionDTOCollection extends AbstractCollection
{
    /**
     * @codeCoverageIgnore
     */
    public function getType(): string
    {
        return BannedChampionDTO::class;
    }

    /**
     * @param array<array<string, array|string>> $data
     *
     * @return BannedChampionDTOCollection<BannedChampionDTO>
     */
    public static function createFromArray(array $data): self
    {
        $collection = new self();
        foreach ($data as $item) {
            $collection->add(BannedChampionDTO::createFromArray($item));
        }

        return $collection;
    }
}
