<?php

declare(strict_types=1);

namespace Riot\Collection;

use Ramsey\Collection\AbstractCollection;
use Riot\DTO\ServiceDTO;

final class ServiceDTOCollection extends AbstractCollection
{
    /**
     * @codeCoverageIgnore
     */
    public function getType(): string
    {
        return ServiceDTO::class;
    }

    /**
     * @param array<array<string, array|string>> $data
     */
    public static function createFromArray(array $data): self
    {
        $collection = new self();
        foreach ($data as $item) {
            $collection->add(ServiceDTO::createFromArray($item));
        }

        return $collection;
    }
}
