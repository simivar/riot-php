<?php

declare(strict_types=1);

namespace Riot\Collection;

use Ramsey\Collection\AbstractCollection;
use Riot\DTO\LorPlayerDTO;

/**
 * @codeCoverageIgnore
 */
final class LorPlayerDTOCollection extends AbstractCollection
{
    public function getType(): string
    {
        return LorPlayerDTO::class;
    }

    /**
     * @param array<array<string, int|string|array>> $data
     *
     * @return LorPlayerDTOCollection<LorPlayerDTO>
     */
    public static function createFromArray(array $data): self
    {
        $collection = new self();
        foreach ($data as $item) {
            $collection->add(LorPlayerDTO::createFromArray($item));
        }

        return $collection;
    }
}
