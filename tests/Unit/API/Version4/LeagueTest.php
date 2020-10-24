<?php

declare(strict_types=1);

namespace Tests\Riot\Unit\API\Version4;

use Riot\API\Version4\League;
use Riot\DTO\LeagueListDTO;
use Riot\Enum\QueueEnum;
use Riot\Enum\RegionEnum;
use Riot\Tests\APITestCase;

final class LeagueTest extends APITestCase
{
    public function testGetChallengerLeaguesByQueueReturnsProperObjectOnSuccess(): void
    {
        $league = new League($this->createObjectConnectionMock(
            'lol/league/v4/challengerleagues/by-queue/RANKED_SOLO_5x5',
            [
                'tier' => 'CHALLENGER',
                'leagueId' => '12345678-1ba0-3357-829e-4793b7be8601',
                'queue' => 'RANKED_SOLO_5x5',
                'name' => "Renekton's Maulers",
                'entries' => [],
            ],
            'eun1',
        ));
        $result = $league->getChallengerLeaguesByQueue(QueueEnum::RANKED_SOLO_5x5(), RegionEnum::EUN1());
        self::assertInstanceOf(LeagueListDTO::class, $result);
    }

    public function testGetGrandmasterLeaguesByQueueReturnsProperObjectOnSuccess(): void
    {
        $league = new League($this->createObjectConnectionMock(
            'lol/league/v4/grandmasterleagues/by-queue/RANKED_SOLO_5x5',
            [
                'tier' => 'GRANDMASTER',
                'leagueId' => '12345678-1ba0-3357-829e-4793b7be8601',
                'queue' => 'RANKED_SOLO_5x5',
                'name' => "Renekton's Maulers",
                'entries' => [],
            ],
            'eun1',
        ));
        $result = $league->getGrandmasterLeaguesByQueue(QueueEnum::RANKED_SOLO_5x5(), RegionEnum::EUN1());
        self::assertInstanceOf(LeagueListDTO::class, $result);
    }

    public function testGeyByIdReturnsProperObjectOnSuccess(): void
    {
        $league = new League($this->createObjectConnectionMock(
            'lol/league/v4/leagues/1',
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

    public function testGetMasterLeaguesByQueueReturnsProperObjectOnSuccess(): void
    {
        $league = new League($this->createObjectConnectionMock(
            'lol/league/v4/masterleagues/by-queue/RANKED_SOLO_5x5',
            [
                'tier' => 'GRANDMASTER',
                'leagueId' => '12345678-1ba0-3357-829e-4793b7be8601',
                'queue' => 'RANKED_SOLO_5x5',
                'name' => "Renekton's Maulers",
                'entries' => [],
            ],
            'eun1',
        ));
        $result = $league->getMasterLeaguesByQueue(QueueEnum::RANKED_SOLO_5x5(), RegionEnum::EUN1());
        self::assertInstanceOf(LeagueListDTO::class, $result);
    }
}
