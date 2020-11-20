<?php

declare(strict_types=1);

namespace Riot\Tests\Unit\DTO;

use PHPUnit\Framework\TestCase;
use Riot\Collection\StatusDTOCollection;
use Riot\DTO\StatusDTO;

final class StatusDTOCollectionTest extends TestCase
{
    public function testCreateFromArrayCreatesProperObject(): void
    {
        $data = [
            [
                'id' => 2163,
                'platforms' => [
                    'windows',
                    'macos',
                ],
                'incident_severity' => null,
                'updates' => [],
                'created_at' => '2020-11-08T01:25:00.404387+00:00',
                'archive_at' => null,
                'titles' => [],
                'maintenance_status' => 'scheduled',
                'updated_at' => null,
            ],
        ];
        $object = StatusDTOCollection::createFromArray($data);
        self::assertFalse($object->isEmpty());
        self::assertInstanceOf(StatusDTO::class, $object->offsetGet(0));
    }

    public function testCreateFromArrayReturnsEmptyCollectionWhenNoData(): void
    {
        $data = [];
        $object = StatusDTOCollection::createFromArray($data);
        self::assertTrue($object->isEmpty());
    }
}
