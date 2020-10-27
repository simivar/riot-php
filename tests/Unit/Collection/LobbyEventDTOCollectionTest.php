<?php

declare(strict_types=1);

namespace Riot\Tests\Unit\DTO;

use PHPUnit\Framework\TestCase;
use Riot\Collection\LobbyEventDTOCollection;
use Riot\DTO\LobbyEventDTO;

final class LobbyEventDTOCollectionTest extends TestCase
{
    public function testCreateFromArrayCreatesProperObject(): void
    {
        $data = [
            [
                'timestamp' => '1234567890000',
                'eventType' => 'PracticeGameCreatedEvent',
                'summonerId' => '3',
            ],
        ];
        $object = LobbyEventDTOCollection::createFromArray($data);
        self::assertFalse($object->isEmpty());
        self::assertInstanceOf(LobbyEventDTO::class, $object->offsetGet(0));
    }

    public function testCreateFromArrayReturnsEmptyCollectionWhenNoData(): void
    {
        $data = [];
        $object = LobbyEventDTOCollection::createFromArray($data);
        self::assertTrue($object->isEmpty());
    }
}
