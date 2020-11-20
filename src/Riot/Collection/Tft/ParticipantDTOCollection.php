<?php

declare(strict_types=1);

namespace Riot\Collection\Tft;

use Ramsey\Collection\AbstractCollection;
use Riot\DTO\Tft\ParticipantDTO;

/**
 * @codeCoverageIgnore
 */
final class ParticipantDTOCollection extends AbstractCollection
{
    public function getType(): string
    {
        return ParticipantDTO::class;
    }

    /**
     * @param array<array<string, int|string|array|float>> $data
     *
     * @return self<ParticipantDTO>
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
