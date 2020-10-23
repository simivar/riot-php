<?php

declare(strict_types=1);

namespace Riot\Tests\Unit\DTO;

use PHPUnit\Framework\TestCase;
use Riot\Collection\IncidentDTOCollection;
use Riot\DTO\IncidentDTO;

final class IncidentDTOCollectionTest extends TestCase
{
    public function testCreateFromArrayCreatesProperObject(): void
    {
        $data = [
            [
                "id" => 500,
                "active" => false,
                "created_at" => "2020-01-22T02:27:02.532Z",
                "updates" => [],
            ]
        ];
        $object = IncidentDTOCollection::createFromArray($data);
        self::assertFalse($object->isEmpty());
        self::assertInstanceOf(IncidentDTO::class, $object->offsetGet(0));
    }

    public function testCreateFromArrayReturnsEmptyCollectionWhenNoData(): void
    {
        $data = [];
        $object = IncidentDTOCollection::createFromArray($data);
        self::assertTrue($object->isEmpty());
    }
}
