<?php

declare(strict_types=1);

namespace Riot\Collection\Clash;

use Ramsey\Collection\AbstractCollection;
use Riot\DTO\Clash\TournamentDTO;

final class TournamentDTOCollection extends AbstractCollection
{
    /**
     * @codeCoverageIgnore
     */
    public function getType(): string
    {
        return TournamentDTO::class;
    }

    /**
     * @param array<array<string, int>> $data
     *
     * @return self<TournamentDTO>
     */
    public static function createFromArray(array $data): self
    {
        $collection = new self();
        foreach ($data as $item) {
            $collection->add(TournamentDTO::createFromArray($item));
        }

        return $collection;
    }
}
