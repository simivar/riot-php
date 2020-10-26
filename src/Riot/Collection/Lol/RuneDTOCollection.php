<?php

declare(strict_types=1);

namespace Riot\Collection\Lol;

use Ramsey\Collection\AbstractCollection;
use Riot\DTO\Lol\RuneDTO;

final class RuneDTOCollection extends AbstractCollection
{
    /**
     * @codeCoverageIgnore
     */
    public function getType(): string
    {
        return RuneDTO::class;
    }

    /**
     * @param array<array<string, array|string|int>> $data
     *
     * @return self<RuneDTO>
     */
    public static function createFromArray(array $data): self
    {
        $collection = new self();
        foreach ($data as $item) {
            $collection->add(RuneDTO::createFromArray($item));
        }

        return $collection;
    }
}
