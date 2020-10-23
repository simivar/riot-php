<?php

declare(strict_types=1);

namespace Riot\Tests\Unit\DTO;

use PHPUnit\Framework\TestCase;
use Riot\Collection\GameCustomizationObjectDTOCollection;
use Riot\DTO\CurrentGameParticipantDTO;
use Riot\DTO\PerksDTO;

final class CurrentGameParticipantDTOTest extends TestCase
{
    public function testCreateFromArrayCreatesProperObject(): void
    {
        $data = [
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
        ];
        $object = CurrentGameParticipantDTO::createFromArray($data);
        self::assertSame(100, $object->getTeamId());
        self::assertSame(4, $object->getSpell1Id());
        self::assertSame(14, $object->getSpell2Id());
        self::assertSame(238, $object->getChampionId());
        self::assertSame(17, $object->getProfileIconId());
        self::assertSame('Player One', $object->getSummonerName());
        self::assertFalse($object->isBot());
        self::assertSame('some-summoner-id', $object->getSummonerId());
        self::assertInstanceOf(GameCustomizationObjectDTOCollection::class, $object->getGameCustomizationObjects());
        self::assertInstanceOf(PerksDTO::class, $object->getPerks());
    }
}
