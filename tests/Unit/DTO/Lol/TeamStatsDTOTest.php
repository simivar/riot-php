<?php

declare(strict_types=1);

namespace Unit\DTO\Lol;

use PHPUnit\Framework\TestCase;
use Riot\Collection\Lol\TeamBansDTOCollection;
use Riot\DTO\Lol\TeamStatsDTO;

final class TeamStatsDTOTest extends TestCase
{
    public function testCreateFromArrayCreatesProperObject(): void
    {
        $data = [
            'teamId' => 100,
            'win' => 'Win',
            'firstBlood' => false,
            'firstTower' => false,
            'firstInhibitor' => true,
            'firstBaron' => false,
            'firstDragon' => true,
            'firstRiftHerald' => true,
            'towerKills' => 11,
            'inhibitorKills' => 3,
            'baronKills' => 0,
            'dragonKills' => 4,
            'vilemawKills' => 0,
            'riftHeraldKills' => 1,
            'dominionVictoryScore' => 0,
            'bans' => [],
        ];
        $object = TeamStatsDTO::createFromArray($data);
        self::assertSame(100, $object->getTeamId()->getValue());
        self::assertSame('Win', $object->getWin()->getValue());
        self::assertFalse($object->isFirstBlood());
        self::assertFalse($object->isFirstTower());
        self::assertTrue($object->isFirstInhibitor());
        self::assertFalse($object->isFirstBaron());
        self::assertTrue($object->isFirstDragon());
        self::assertTrue($object->isFirstRiftHerald());
        self::assertSame(11, $object->getTowerKills());
        self::assertSame(3, $object->getInhibitorKills());
        self::assertSame(0, $object->getBaronKills());
        self::assertSame(4, $object->getDragonKills());
        self::assertSame(0, $object->getVilemawKills());
        self::assertSame(1, $object->getRiftHeraldKills());
        self::assertSame(0, $object->getDominionVictoryScore());
        self::assertInstanceOf(TeamBansDTOCollection::class, $object->getBans());
    }
}
