<?php

declare(strict_types=1);

namespace Riot\Collection\Lol;

use Ramsey\Collection\AbstractCollection;
use Riot\DTO\Lol\TeamBansDTO;

final class TeamBansDTOCollection extends AbstractCollection
{
    /**
     * @codeCoverageIgnore
     */
    public function getType(): string
    {
        return TeamBansDTO::class;
    }

    /**
     * @param array<array<string, int>> $data
     *
     * @return self<TeamBansDTO>
     */
    public static function createFromArray(array $data): self
    {
        $collection = new self();
        foreach ($data as $item) {
            $collection->add(TeamBansDTO::createFromArray($item));
        }

        return $collection;
    }
}
