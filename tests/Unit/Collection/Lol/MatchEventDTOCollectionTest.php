<?php

declare(strict_types=1);

namespace Riot\Tests\Unit\DTO\Lol;

use PHPUnit\Framework\TestCase;
use Riot\Collection\Lol\MatchEventDTOCollection;
use Riot\Collection\Lol\MatchFrameDTOCollection;
use Riot\DTO\Lol\MatchEventDTO;
use Riot\DTO\Lol\MatchFrameDTO;

final class MatchEventDTOCollectionTest extends TestCase
{
    public function testCreateFromArrayCreatesProperObject(): void
    {
        $data = [
            [
                'type' => 'ITEM_PURCHASED',
                'timestamp' => 9121,
                'participantId' => 7,
                'itemId' => 3340,
            ]
        ];
        $object = MatchEventDTOCollection::createFromArray($data);
        self::assertFalse($object->isEmpty());
        self::assertInstanceOf(MatchEventDTO::class, $object->offsetGet(0));
    }

    public function testCreateFromArrayReturnsEmptyCollectionWhenNoData(): void
    {
        $data = [];
        $object = MatchEventDTOCollection::createFromArray($data);
        self::assertTrue($object->isEmpty());
    }
}
