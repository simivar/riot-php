<?php

declare(strict_types=1);

namespace Riot\Collection;

use Ramsey\Collection\AbstractCollection;
use Riot\DTO\FeaturedGameInfoDTO;

final class FeaturedGameInfoDTOCollection extends AbstractCollection
{
    /**
     * @codeCoverageIgnore
     */
    public function getType(): string
    {
        return FeaturedGameInfoDTO::class;
    }

    /**
     * @param array<array<string, array|string>> $data
     *
     * @return FeaturedGameInfoDTOCollection<FeaturedGameInfoDTO>
     */
    public static function createFromArray(array $data): self
    {
        $collection = new self();
        foreach ($data as $item) {
            $collection->add(FeaturedGameInfoDTO::createFromArray($item));
        }

        return $collection;
    }
}
