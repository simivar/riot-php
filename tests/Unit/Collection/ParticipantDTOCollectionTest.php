<?php

declare(strict_types=1);

namespace Riot\Tests\Unit\DTO;

use PHPUnit\Framework\TestCase;
use Riot\Collection\ParticipantDTOCollection;
use Riot\DTO\ParticipantDTO;

final class ParticipantDTOCollectionTest extends TestCase
{
    public function testCreateFromArrayCreatesProperObject(): void
    {
        $data = [
            [
                'teamId' => 200,
                'spell1Id' => 32,
                'spell2Id' => 4,
                'championId' => 150,
                'skinIndex' => 0,
                'profileIconId' => 7,
                'summonerName' => 'Player One',
                'bot' => false,
            ],
        ];
        $object = ParticipantDTOCollection::createFromArray($data);
        self::assertFalse($object->isEmpty());
        self::assertInstanceOf(ParticipantDTO::class, $object->offsetGet(0));
    }

    public function testCreateFromArrayReturnsEmptyCollectionWhenNoData(): void
    {
        $data = [];
        $object = ParticipantDTOCollection::createFromArray($data);
        self::assertTrue($object->isEmpty());
    }
}
