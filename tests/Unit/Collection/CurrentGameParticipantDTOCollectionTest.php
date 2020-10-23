<?php

declare(strict_types=1);

namespace Riot\Tests\Unit\DTO;

use PHPUnit\Framework\TestCase;
use Riot\Collection\CurrentGameParticipantDTOCollection;
use Riot\DTO\CurrentGameParticipantDTO;

final class CurrentGameParticipantDTOCollectionTest extends TestCase
{
    public function testCreateFromArrayCreatesProperObject(): void
    {
        $data = [
            [
                'teamId' => 100,
                'spell1Id' => 4,
                'spell2Id' => 14,
                'championId' => 238,
                'profileIconId' => 17,
                'summonerName' => 'Player One',
                'bot' => false,
                'summonerId' => 'some-summoner-id',
                'gameCustomizationObjects' => [],
                'perks' => [
                    'perkIds' => [],
                    'perkStyle' => 1,
                    'perkSubStyle' => 1,
                ],
            ],
        ];
        $object = CurrentGameParticipantDTOCollection::createFromArray($data);
        self::assertFalse($object->isEmpty());
        self::assertInstanceOf(CurrentGameParticipantDTO::class, $object->offsetGet(0));
    }

    public function testCreateFromArrayReturnsEmptyCollectionWhenNoData(): void
    {
        $data = [];
        $object = CurrentGameParticipantDTOCollection::createFromArray($data);
        self::assertTrue($object->isEmpty());
    }
}
