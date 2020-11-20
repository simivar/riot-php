<?php

declare(strict_types=1);

namespace Riot\Tests\Unit\DTO;

use PHPUnit\Framework\TestCase;
use Riot\Collection\ContentDTOCollection;
use Riot\Collection\UpdateDTOCollection;
use Riot\DTO\StatusDTO;

final class StatusDTOTest extends TestCase
{
    public function testCreateFromArrayCreatesProperObject(): void
    {
        $data = [
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
        ];
        $object = StatusDTO::createFromArray($data);
        self::assertSame(2163, $object->getId());
        self::assertIsArray($object->getPlatforms());
        self::assertCount(2, $object->getPlatforms());
        self::assertSame('macos', $object->getPlatforms()[1]);
        self::assertNull($object->getIncidentSeverity());
        self::assertInstanceOf(UpdateDTOCollection::class, $object->getUpdates());
        self::assertEmpty($object->getUpdates());
        self::assertSame('2020-11-08T01:25:00.404387+00:00', $object->getCreatedAt());
        self::assertNull($object->getArchiveAt());
        self::assertInstanceOf(ContentDTOCollection::class, $object->getTitles());
        self::assertEmpty($object->getTitles());
        self::assertSame('scheduled', $object->getMaintenanceStatus());
        self::assertNull($object->getUpdatedAt());
    }
}
