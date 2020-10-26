<?php

declare(strict_types=1);

namespace Riot\Collection\Lol;

use Ramsey\Collection\AbstractCollection;
use Riot\DTO\Lol\ParticipantIdentityDTO;

final class ParticipantIdentityDTOCollection extends AbstractCollection
{
    /**
     * @codeCoverageIgnore
     */
    public function getType(): string
    {
        return ParticipantIdentityDTO::class;
    }

    /**
     * @param array<array<string, array|string|int>> $data
     *
     * @return self<ParticipantIdentityDTO>
     */
    public static function createFromArray(array $data): self
    {
        $collection = new self();
        foreach ($data as $item) {
            $collection->add(ParticipantIdentityDTO::createFromArray($item));
        }

        return $collection;
    }
}
