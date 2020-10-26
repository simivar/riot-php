<?php

declare(strict_types=1);

namespace Riot\Collection\Clash;

use Ramsey\Collection\AbstractCollection;
use Riot\DTO\Clash\PlayerDTO;

final class PlayerDTOCollection extends AbstractCollection
{
    /**
     * @codeCoverageIgnore
     */
    public function getType(): string
    {
        return PlayerDTO::class;
    }

    /**
     * @param array<array<string, int>> $data
     *
     * @return self<PlayerDTO>
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
