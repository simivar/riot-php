<?php

declare(strict_types=1);

namespace Riot\Tests\Unit\DTO;

use PHPUnit\Framework\TestCase;
use Riot\Collection\ContentDTOCollection;
use Riot\DTO\UpdateDTO;

final class UpdateDTOTest extends TestCase
{
    public function testCreateFromArrayCreatesProperObject(): void
    {
        $data = [
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
        ];
        $object = UpdateDTO::createFromArray($data);
        self::assertSame(3214, $object->getId());
        self::assertIsArray($object->getPublishLocations());
        self::assertCount(2, $object->getPublishLocations());
        self::assertSame('game', $object->getPublishLocations()[0]);
        self::assertTrue($object->isPublish());
        self::assertInstanceOf(ContentDTOCollection::class, $object->getTranslations());
        self::assertSame('2020-11-08T01:25:00.434856+00:00', $object->getCreatedAt());
        self::assertSame('Riot Games', $object->getAuthor());
        self::assertSame('2020-11-09T12:00:00+00:00', $object->getUpdatedAt());
    }
}
