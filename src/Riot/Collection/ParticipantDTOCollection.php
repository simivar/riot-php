<?php

declare(strict_types=1);

namespace Riot\Collection;

use Ramsey\Collection\AbstractCollection;
use Riot\DTO\ParticipantDTO;

final class ParticipantDTOCollection extends AbstractCollection
{
    /**
     * @codeCoverageIgnore
     */
    public function getType(): string
    {
        return ParticipantDTO::class;
    }

    /**
     * @param array<array<string, array|string>> $data
     *
     * @return ParticipantDTOCollection<ParticipantDTO>
     */
    public static function createFromArray(array $data): self
    {
        $collection = new self();
        foreach ($data as $item) {
            $collection->add(ParticipantDTO::createFromArray($item));
        }

        return $collection;
    }
}
