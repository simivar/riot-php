<?php

declare(strict_types=1);

namespace Riot\Collection\Tft;

use Ramsey\Collection\AbstractCollection;
use Riot\DTO\Tft\UnitDTO;

/**
 * @codeCoverageIgnore
 */
final class UnitDTOCollection extends AbstractCollection
{
    public function getType(): string
    {
        return UnitDTO::class;
    }

    /**
     * @param array<array<string, int|string|array>> $data
     *
     * @return self<UnitDTO>
     */
    public static function createFromArray(array $data): self
    {
        $collection = new self();
        foreach ($data as $item) {
            $collection->add(UnitDTO::createFromArray($item));
        }

        return $collection;
    }
}
