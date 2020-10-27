<?php

declare(strict_types=1);

namespace Riot\Tests\Unit\DTO;

use PHPUnit\Framework\TestCase;
use Riot\DTO\TournamentCodeDTO;

final class TournamentCodeDTOTest extends TestCase
{
    public function testCreateFromArrayCreatesProperObject(): void
    {
        $data = [
            'code' => 'TOURNAMENT-CODE',
            'spectators' => 'ALL',
            'lobbyName' => 'name',
            'metaData' => 'meta',
            'password' => 'pass',
            'teamSize' => 5,
            'providerId' => 69,
            'pickType' => 'ALL_RANDOM',
            'tournamentId' => 6000,
            'id' => 9001,
            'region' => 'EUNE',
            'map' => 'SUMMONERS_RIFT',
            'participants' => [],
        ];
        $object = TournamentCodeDTO::createFromArray($data);
        self::assertSame('TOURNAMENT-CODE', $object->getCode());
        self::assertSame('ALL', $object->getSpectators()->getValue());
        self::assertSame('name', $object->getLobbyName());
        self::assertSame('meta', $object->getMetaData());
        self::assertSame('pass', $object->getPassword());
        self::assertSame(5, $object->getTeamSize());
        self::assertSame(69, $object->getProviderId());
        self::assertSame('ALL_RANDOM', $object->getPickType()->getValue());
        self::assertSame(6000, $object->getTournamentId());
        self::assertSame(9001, $object->getId());
        self::assertSame('EUNE', $object->getRegion()->getValue());
        self::assertSame('SUMMONERS_RIFT', $object->getMap()->getValue());
        self::assertIsArray($object->getParticipants());
    }
}
