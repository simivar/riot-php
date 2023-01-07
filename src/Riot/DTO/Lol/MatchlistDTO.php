<?php

declare(strict_types=1);

namespace Riot\DTO\Lol;

use Riot\Collection\Lol\MatchReferenceDTOCollection;
use Riot\DTO\DTOInterface;

final class MatchlistDTO implements DTOInterface
{
    /** @var MatchReferenceDTOCollection<MatchReferenceDTO> */
    private MatchReferenceDTOCollection $matches;

    /**
     * @param MatchReferenceDTOCollection<MatchReferenceDTO> $matches
     */
    public function __construct(
        MatchReferenceDTOCollection $matches
    ) {
        $this->matches = $matches;
    }

    /**
     * @return MatchReferenceDTOCollection<MatchReferenceDTO>
     */
    public function getMatches(): MatchReferenceDTOCollection
    {
        return $this->matches;
    }

    public static function createFromArray(array $data): self
    {
        return new self(
            MatchReferenceDTOCollection::createFromArray($data),
        );
    }
}
