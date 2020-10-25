<?php

declare(strict_types=1);

namespace Riot\Collection\Lol;

use Ramsey\Collection\AbstractCollection;
use Riot\DTO\Lol\MasteryDTO;

final class MasteryDTOCollection extends AbstractCollection
{
    /**
     * @codeCoverageIgnore
     */
    public function getType(): string
    {
        return MasteryDTO::class;
    }

    /**
     * @param array<array<string, int>> $data
     *
     * @return self<MasteryDTO>
     */
    public static function createFromArray(array $data): self
    {
        $collection = new self();
        foreach ($data as $item) {
            $collection->add(MasteryDTO::createFromArray($item));
        }

        return $collection;
    }
}
