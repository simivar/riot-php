<?php

declare(strict_types=1);

namespace Riot\Tests\Unit\DTO;

use PHPUnit\Framework\TestCase;
use Riot\Collection\LeagueEntryDTOCollection;
use Riot\DTO\LeagueEntryDTO;
final class LeagueEntryDTOCollectionTest extends TestCase
{
    public function testCreateFromArrayCreatesProperObject(): void
    {
        $data = [
            [
                'leagueId' => 'some-league-id',
                'queueType' => 'RANKED_SOLO_5x5',
                'tier' => 'SILVER',
                'rank' => 'I',
                'summonerId' => 'some-summoner-id',
                'summonerName' => 'Player One',
                'leaguePoints' => 5,
                'wins' => 34,
                'losses' => 35,
                'veteran' => false,
                'inactive' => false,
                'freshBlood' => false,
                'hotStreak' => false,
            ],
        ];
        $object = LeagueEntryDTOCollection::createFromArray($data);
        self::assertFalse($object->isEmpty());
        self::assertInstanceOf(LeagueEntryDTO::class, $object->offsetGet(0));
    }

    public function testCreateFromArrayReturnsEmptyCollectionWhenNoData(): void
    {
        $data = [];
        $object = LeagueEntryDTOCollection::createFromArray($data);
        self::assertTrue($object->isEmpty());
    }
}
