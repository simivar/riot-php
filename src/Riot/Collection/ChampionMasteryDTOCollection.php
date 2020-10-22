<?php

declare(strict_types=1);

namespace Riot\Collection;

use Ramsey\Collection\AbstractCollection;
use Riot\DTO\ChampionMasteryDTO;

/**
 * @codeCoverageIgnore
 */
final class ChampionMasteryDTOCollection extends AbstractCollection
{
    public function getType(): string
    {
        return ChampionMasteryDTO::class;
    }
}
