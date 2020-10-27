<?php

declare(strict_types=1);

namespace Riot\Collection;

use Ramsey\Collection\AbstractCollection;
use Riot\DTO\LobbyEventDTO;

final class LobbyEventDTOCollection extends AbstractCollection
{
    /**
     * @codeCoverageIgnore
     */
    public function getType(): string
    {
        return LobbyEventDTO::class;
    }

    /**
     * @param array<array<string, string>> $data
     *
     * @return self<LobbyEventDTO>
     */
    public static function createFromArray(array $data): self
    {
        $collection = new self();
        foreach ($data as $item) {
            $collection->add(LobbyEventDTO::createFromArray($item));
        }

        return $collection;
    }
}
