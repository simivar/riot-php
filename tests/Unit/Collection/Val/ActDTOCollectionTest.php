<?php

declare(strict_types=1);

namespace Riot\Tests\Unit\DTO\Val;

use PHPUnit\Framework\TestCase;
use Riot\Collection\Val\ActDTOCollection;
use Riot\DTO\Val\ActDTO;

final class ActDTOCollectionTest extends TestCase
{
    public function testCreateFromArrayCreatesProperObject(): void
    {
        $data = [
            [
                'id' => '1234adb9-4dcb-6899-1306-3e9860661dd3',
                'name' => 'Closed Beta',
                'localizedNames' => null,
                'isActive' => false,
            ],
        ];
        $object = ActDTOCollection::createFromArray($data);
        self::assertFalse($object->isEmpty());
        self::assertInstanceOf(ActDTO::class, $object->offsetGet(0));
    }

    public function testCreateFromArrayReturnsEmptyCollectionWhenNoData(): void
    {
        $data = [];
        $object = ActDTOCollection::createFromArray($data);
        self::assertTrue($object->isEmpty());
    }
}
