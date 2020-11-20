<?php

declare(strict_types=1);

namespace Riot\Collection\Tft;

use Ramsey\Collection\AbstractCollection;
use Riot\DTO\Tft\TraitDTO;

/**
 * @codeCoverageIgnore
 */
final class TraitDTOCollection extends AbstractCollection
{
    public function getType(): string
    {
        return TraitDTO::class;
    }

    /**
     * @param array<array<string, int|string|array>> $data
     *
     * @return self<TraitDTO>
     */
    public static function createFromArray(array $data): self
    {
        $collection = new self();
        foreach ($data as $item) {
            $collection->add(TraitDTO::createFromArray($item));
        }

        return $collection;
    }
}
