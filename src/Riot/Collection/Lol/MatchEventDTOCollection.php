<?php

declare(strict_types=1);

namespace Riot\Collection\Lol;

use Ramsey\Collection\AbstractCollection;
use Riot\DTO\Lol\MatchEventDTO;

final class MatchEventDTOCollection extends AbstractCollection
{
    /**
     * @codeCoverageIgnore
     */
    public function getType(): string
    {
        return MatchEventDTO::class;
    }

    /**
     * @param array<array<string, int|string>> $data
     *
     * @return self<MatchEventDTO>
     */
    public static function createFromArray(array $data): self
    {
        $collection = new self();
        foreach ($data as $item) {
            $collection->add(MatchEventDTO::createFromArray($item));
        }

        return $collection;
    }
}
