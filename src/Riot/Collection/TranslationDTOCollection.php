<?php

declare(strict_types=1);

namespace Riot\Collection;

use Ramsey\Collection\AbstractCollection;
use Riot\DTO\TranslationDTO;

final class TranslationDTOCollection extends AbstractCollection
{
    /**
     * @codeCoverageIgnore
     */
    public function getType(): string
    {
        return TranslationDTO::class;
    }

    /**
     * @param array<array<string, string>> $data
     */
    public static function createFromArray(array $data): self
    {
        $collection = new self();
        foreach ($data as $item) {
            $collection->add(TranslationDTO::createFromArray($item));
        }

        return $collection;
    }
}
