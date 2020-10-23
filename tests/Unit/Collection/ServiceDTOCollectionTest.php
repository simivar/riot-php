<?php

declare(strict_types=1);

namespace Riot\Tests\Unit\DTO;

use PHPUnit\Framework\TestCase;
use Riot\Collection\ServiceDTOCollection;
use Riot\DTO\ServiceDTO;

final class ServiceDTOCollectionTest extends TestCase
{
    public function testCreateFromArrayCreatesProperObject(): void
    {
        $data = [
            [
                'name' => 'Game',
                'slug' => 'game',
                'status' => 'online',
                'incidents' => [],
            ]
        ];
        $object = ServiceDTOCollection::createFromArray($data);
        self::assertFalse($object->isEmpty());
        self::assertInstanceOf(ServiceDTO::class, $object->offsetGet(0));
    }

    public function testCreateFromArrayReturnsEmptyCollectionWhenNoData(): void
    {
        $data = [];
        $object = ServiceDTOCollection::createFromArray($data);
        self::assertTrue($object->isEmpty());
    }
}
