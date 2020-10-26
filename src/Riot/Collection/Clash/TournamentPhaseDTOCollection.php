<?php

declare(strict_types=1);

namespace Riot\Collection\Clash;

use Ramsey\Collection\AbstractCollection;
use Riot\DTO\Clash\TournamentPhaseDTO;

final class TournamentPhaseDTOCollection extends AbstractCollection
{
    /**
     * @codeCoverageIgnore
     */
    public function getType(): string
    {
        return TournamentPhaseDTO::class;
    }

    /**
     * @param array<array<string, int>> $data
     *
     * @return self<TournamentPhaseDTO>
     */
    public static function createFromArray(array $data): self
    {
        $collection = new self();
        foreach ($data as $item) {
            $collection->add(TournamentPhaseDTO::createFromArray($item));
        }

        return $collection;
    }
}
