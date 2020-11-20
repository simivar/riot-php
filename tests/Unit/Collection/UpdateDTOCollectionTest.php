<?php

declare(strict_types=1);

namespace Riot\Tests\Unit\DTO;

use PHPUnit\Framework\TestCase;
use Riot\Collection\UpdateDTOCollection;
use Riot\DTO\UpdateDTO;

final class UpdateDTOCollectionTest extends TestCase
{
    public function testCreateFromArrayCreatesProperObject(): void
    {
        $data = [
            [
                'id' => 3214,
                'publish_locations' => [
                    'game',
                    'riotstatus',
                ],
                'publish' => true,
                'translations' => [
                ],
                'created_at' => '2020-11-08T01:25:00.434856+00:00',
                'author' => 'Riot Games',
                'updated_at' => '2020-11-09T12:00:00+00:00',
            ],
        ];
        $object = UpdateDTOCollection::createFromArray($data);
        self::assertFalse($object->isEmpty());
        self::assertInstanceOf(UpdateDTO::class, $object->offsetGet(0));
    }

    public function testCreateFromArrayReturnsEmptyCollectionWhenNoData(): void
    {
        $data = [];
        $object = UpdateDTOCollection::createFromArray($data);
        self::assertTrue($object->isEmpty());
    }
}
