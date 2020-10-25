<?php

declare(strict_types=1);

namespace Riot\Collection\Lor;

use Ramsey\Collection\AbstractCollection;
use Riot\DTO\Lor\PlayerDTO;

/**
 * @codeCoverageIgnore
 */
final class PlayerDTOCollection extends AbstractCollection
{
    public function getType(): string
    {
        return PlayerDTO::class;
    }

    /**
     * @param array<array<string, int|string|array>> $data
     *
     * @return PlayerDTOCollection<PlayerDTO>
     */
    public static function createFromArray(array $data): self
    {
        $collection = new self();
        foreach ($data as $item) {
            $collection->add(PlayerDTO::createFromArray($item));
        }

        return $collection;
    }
}
