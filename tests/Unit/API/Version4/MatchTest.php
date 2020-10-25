<?php

declare(strict_types=1);

namespace Tests\Riot\Unit\API\Version4;

use Riot\API\Version4\Match;
use Riot\DTO\Lol\MatchDTO;
use Riot\Enum\RegionEnum;
use Riot\Tests\APITestCase;

final class MatchTest extends APITestCase
{
    public function testGetChallengerLeaguesByQueueReturnsProperObjectOnSuccess(): void
    {
        $league = new Match($this->createObjectConnectionMock(
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
}
