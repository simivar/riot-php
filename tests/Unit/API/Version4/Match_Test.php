<?php

declare(strict_types=1);

namespace Tests\Riot\Unit\API\Version4;

use Riot\API\Version4\Match_;
use Riot\DTO\Lol\MatchDTO;
use Riot\DTO\Lol\MatchlistDTO;
use Riot\DTO\Lol\MatchTimelineDTO;
use Riot\Enum\RegionEnum;
use Riot\Filter\MatchlistFilter;
use Riot\Tests\APITestCase;

final class Match_Test extends APITestCase
{
    public function testGetByMatchIdReturnsProperObjectOnSuccess(): void
    {
        $league = new Match_($this->createObjectConnectionMock(
            'lol/match/v4/matches/1',
            [
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
            ],
            'eun1',
        ));
        $result = $league->getByMatchId(1, RegionEnum::EUN1());
        self::assertInstanceOf(MatchDTO::class, $result);
    }

    public function testGetMatchlistByAccountIdReturnsProperObjectOnSuccess(): void
    {
        $league = new Match_($this->createObjectConnectionMock(
            'lol/match/v4/matchlists/by-account/1?',
            [
                'matches' => [],
                'startIndex' => 0,
                'endIndex' => 100,
                'totalGames' => 169,
            ],
            'eun1',
        ));
        $result = $league->getMatchlistByAccountId('1', RegionEnum::EUN1());
        self::assertInstanceOf(MatchlistDTO::class, $result);
    }

    public function testGetMatchlistCallsEndpointWithAppliedFilters(): void
    {
        $filters = $this->createMock(MatchlistFilter::class);
        $filters->expects(self::once())
            ->method('getAsHttpQuery')
            ->willReturn('champion=1%2C2')
        ;

        $league = new Match_($this->createObjectConnectionMock(
            'lol/match/v4/matchlists/by-account/1?champion=1%2C2',
            [
                'matches' => [],
                'startIndex' => 0,
                'endIndex' => 100,
                'totalGames' => 169,
            ],
            'eun1',
        ));
        $result = $league->getMatchlistByAccountId('1', RegionEnum::EUN1(), $filters);
        self::assertInstanceOf(MatchlistDTO::class, $result);
    }

    public function testGetTimelineByMatchIdReturnsProperObjectOnSuccess(): void
    {
        $league = new Match_($this->createObjectConnectionMock(
            'lol/match/v4/timelines/by-match/1',
            [
                'frames' => [],
                'frameInterval' => 60000,
            ],
            'eun1',
        ));
        $result = $league->getTimelineByMatchId(1, RegionEnum::EUN1());
        self::assertInstanceOf(MatchTimelineDTO::class, $result);
    }

    public function testGetIdsByTournamentCodeProperObjectOnSuccess(): void
    {
        $league = new Match_($this->createObjectConnectionMock(
            'lol/match/v4/matches/by-tournament-code/1/ids',
            [
                1234567890,
            ],
            'eun1',
        ));
        $result = $league->getIdsByTournamentCode('1', RegionEnum::EUN1());
        self::assertIsArray($result);
        self::assertArrayHasKey(0, $result);
        self::assertSame(1234567890, $result[0]);
    }

    public function testGetByMatchIdAndTournamentCodeReturnsProperObjectOnSuccess(): void
    {
        $league = new Match_($this->createObjectConnectionMock(
            'lol/match/v4/matches/1/by-tournament-code/1',
            [
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
            ],
            'eun1',
        ));
        $result = $league->getByMatchIdAndTournamentCode(1, '1', RegionEnum::EUN1());
        self::assertInstanceOf(MatchDTO::class, $result);
    }
}
