<?php

declare(strict_types=1);

namespace Riot\Tests\Unit\DTO\Lol;

use PHPUnit\Framework\TestCase;
use Riot\Collection\Lol\ParticipantDTOCollection;
use Riot\Collection\Lol\ParticipantIdentityDTOCollection;
use Riot\Collection\Lol\TeamStatsDTOCollection;
use Riot\DTO\Lol\MatchDTO;

final class MatchDTOTest extends TestCase
{
    public function testCreateFromArrayCreatesProperObject(): void
    {
        $data = [
            'gameId' => 1234567890,
            'platformId' => 'EUN1',
            'gameCreation' => 1603575904886,
            'gameDuration' => 2441,
            'queueId' => 430,
            'mapId' => 11,
            'seasonId' => 13,
            'gameVersion' => '10.21.339.2173',
            'gameMode' => 'CLASSIC',
            'gameType' => 'MATCHED_GAME',
            'teams' => [],
            'participants' => [],
            'participantIdentities' => [],
        ];
        $object = MatchDTO::createFromArray($data);
        self::assertSame(1234567890, $object->getGameId());
        self::assertSame('EUN1', $object->getPlatformId());
        self::assertSame(1603575904886, $object->getGameCreation());
        self::assertSame(2441, $object->getGameDuration());
        self::assertSame(430, $object->getQueueId());
        self::assertSame(11, $object->getMapId());
        self::assertSame(13, $object->getSeasonId());
        self::assertSame('10.21.339.2173', $object->getGameVersion());
        self::assertSame('CLASSIC', $object->getGameMode());
        self::assertSame('MATCHED_GAME', $object->getGameType());
        self::assertInstanceOf(TeamStatsDTOCollection::class, $object->getTeams());
        self::assertInstanceOf(ParticipantDTOCollection::class, $object->getParticipants());
        self::assertInstanceOf(ParticipantIdentityDTOCollection::class, $object->getParticipantIdentities());
    }
}
