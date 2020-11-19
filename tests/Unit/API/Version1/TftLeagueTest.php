<?php

declare(strict_types=1);

namespace Tests\Riot\Unit\API\Version1;

use Riot\API\Version1\TftLeague;
use Riot\Collection\LeagueEntryDTOCollection;
use Riot\DTO\LeagueListDTO;
use Riot\Enum\DivisionEnum;
use Riot\Enum\RegionEnum;
use Riot\Enum\TierEnum;
use Riot\Tests\APITestCase;

final class TftLeagueTest extends APITestCase
{
    public function testGetChallengerLeaguesReturnsProperObjectOnSuccess(): void
    {
        $league = new TftLeague($this->createObjectConnectionMock(
            'tft/league/v1/challenger',
            [
                'tier' => 'GRANDMASTER',
                'leagueId' => '12345678-1ba0-3357-829e-4793b7be8601',
                'queue' => 'RANKED_SOLO_5x5',
                'name' => "Renekton's Maulers",
                'entries' => [],
            ],
            'eun1',
        ));
        $result = $league->getChallenger(RegionEnum::EUN1());
        self::assertInstanceOf(LeagueListDTO::class, $result);
    }

    public function testGetBySummonerIdReturnsProperObjectOnSuccess(): void
    {
        $league = new TftLeague($this->createObjectConnectionMock(
            'tft/league/v1/entries/by-summoner/1',
            [
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
            ],
            'eun1',
        ));
        $result = $league->getBySummonerId('1', RegionEnum::EUN1());
        self::assertInstanceOf(LeagueEntryDTOCollection::class, $result);
    }

    public function testGetTierAndDivisionReturnsProperObjectOnSuccess(): void
    {
        $league = new TftLeague($this->createObjectConnectionMock(
            'tft/league/v1/entries/DIAMOND/II?page=2',
            [
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
            ],
            'eun1',
        ));
        $result = $league->getByTierAndDivision(
            TierEnum::DIAMOND(),
            DivisionEnum::II(),
            RegionEnum::EUN1(),
            2
        );
        self::assertInstanceOf(LeagueEntryDTOCollection::class, $result);
    }

    public function testGetGrandmasterLeaguesReturnsProperObjectOnSuccess(): void
    {
        $league = new TftLeague($this->createObjectConnectionMock(
            'tft/league/v1/grandmaster',
            [
                'tier' => 'GRANDMASTER',
                'leagueId' => '12345678-1ba0-3357-829e-4793b7be8601',
                'queue' => 'RANKED_SOLO_5x5',
                'name' => "Renekton's Maulers",
                'entries' => [],
            ],
            'eun1',
        ));
        $result = $league->getGrandmaster(RegionEnum::EUN1());
        self::assertInstanceOf(LeagueListDTO::class, $result);
    }

    public function testGeyByIdReturnsProperObjectOnSuccess(): void
    {
        $league = new TftLeague($this->createObjectConnectionMock(
            'tft/league/v1/leagues/1',
            [
                'tier' => 'GRANDMASTER',
                'leagueId' => '12345678-1ba0-3357-829e-4793b7be8601',
                'queue' => 'RANKED_SOLO_5x5',
                'name' => "Renekton's Maulers",
                'entries' => [],
            ],
            'eun1',
        ));
        $result = $league->getById(
            '1',
            RegionEnum::EUN1(),
        );
        self::assertInstanceOf(LeagueListDTO::class, $result);
    }

    public function testGetMasterLeaguesReturnsProperObjectOnSuccess(): void
    {
        $league = new TftLeague($this->createObjectConnectionMock(
            'tft/league/v1/master',
            [
                'tier' => 'GRANDMASTER',
                'leagueId' => '12345678-1ba0-3357-829e-4793b7be8601',
                'queue' => 'RANKED_SOLO_5x5',
                'name' => "Renekton's Maulers",
                'entries' => [],
            ],
            'eun1',
        ));
        $result = $league->getMaster(RegionEnum::EUN1());
        self::assertInstanceOf(LeagueListDTO::class, $result);
    }
}
