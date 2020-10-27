<?php

declare(strict_types=1);

namespace Riot\Tests\Unit\API\Version4;

use Riot\API\ResponseDecoderInterface;
use Riot\API\Version4\Tournament;
use Riot\ConnectionInterface;
use Riot\DTO\LobbyEventDTOWrapperDTO;
use Riot\DTO\TournamentCodeDTO;
use Riot\Enum\MapTypeEnum;
use Riot\Enum\PickTypeEnum;
use Riot\Enum\SpectatorTypeEnum;
use Riot\Enum\TournamentRegionEnum;
use Riot\Tests\APITestCase;

final class TournamentTest extends APITestCase
{
    public function testCreateCodeReturnsArrayOnSuccess(): void
    {
        $tournamentStub = new Tournament($this->createObjectConnectionMock(
            'lol/tournament/v4/codes?count=1&tournamentId=5',
            ['summoner-id'],
            'americas',
            'post'
        ));
        $result = $tournamentStub->createCode(
            5,
            1,
            [],
            1,
            PickTypeEnum::TOURNAMENT_DRAFT(),
            MapTypeEnum::SUMMONERS_RIFT(),
            SpectatorTypeEnum::ALL(),
            null
        );
        self::assertIsArray($result);
        self::assertArrayHasKey(0, $result);
        self::assertSame('summoner-id', $result[0]);
    }

    public function testUpdateCodeReturnsTrueOnSuccess(): void
    {
        $riotConnection = $this->createMock(ConnectionInterface::class);
        $riotConnection->expects(self::once())
            ->method('put')
            ->with(self::equalTo('americas'), self::equalTo('lol/tournament/v4/codes/tournament-code'))
            ->willReturn($this->createMock(ResponseDecoderInterface::class))
        ;

        $tournamentStub = new Tournament($riotConnection);
        $result = $tournamentStub->updateCode(
            'tournament-code',
            [],
            PickTypeEnum::TOURNAMENT_DRAFT(),
            MapTypeEnum::SUMMONERS_RIFT(),
            SpectatorTypeEnum::ALL(),
        );
        self::assertTrue($result);
    }

    public function testGetCodeByTournamentCodeReturnsLobbyEventDTOWrapperDTOOnSuccess(): void
    {
        $tournamentStub = new Tournament($this->createObjectConnectionMock(
            'lol/tournament/v4/codes/tournament-code',
            [
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
            ],
            'americas',
        ));
        $result = $tournamentStub->getCodeByTournamentCode('tournament-code');
        self::assertInstanceOf(TournamentCodeDTO::class, $result);
    }

    public function testGetLobbyEventsByTournamentCodeReturnsLobbyEventDTOWrapperDTOOnSuccess(): void
    {
        $tournamentStub = new Tournament($this->createObjectConnectionMock(
            'lol/tournament/v4/lobby-events/by-code/tournament-code',
            ['eventList' => []],
            'americas',
        ));
        $result = $tournamentStub->getLobbyEventsByTournamentCode('tournament-code');
        self::assertInstanceOf(LobbyEventDTOWrapperDTO::class, $result);
    }

    public function testCreateProviderReturnsIntegerOnSuccess(): void
    {
        $tournamentStub = new Tournament($this->createIntConnectionMock(
            'lol/tournament/v4/providers',
            5,
            'americas',
            'post',
        ));
        $result = $tournamentStub->createProvider(TournamentRegionEnum::EUNE(), 'http://localhost');
        self::assertSame(5, $result);
    }

    public function testCreateTournamentReturnsIntegerOnSuccess(): void
    {
        $tournamentStub = new Tournament($this->createIntConnectionMock(
            'lol/tournament/v4/tournaments',
            5,
            'americas',
            'post',
        ));
        $result = $tournamentStub->createTournament(1, 'name');
        self::assertSame(5, $result);
    }
}
