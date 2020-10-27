<?php

declare(strict_types=1);

namespace Tests\Riot\Unit\API\Version4;

use Riot\API\Version4\LeagueExp;
use Riot\Collection\LeagueEntryDTOCollection;
use Riot\Enum\DivisionEnum;
use Riot\Enum\QueueEnum;
use Riot\Enum\RegionEnum;
use Riot\Enum\TierExpEnum;
use Riot\Tests\APITestCase;

final class LeagueExpTest extends APITestCase
{
    public function testGetByQueueAndTierAndDivisionReturnsProperObjectOnSuccess(): void
    {
        $league = new LeagueExp($this->createObjectConnectionMock(
            'lol/league/v4/entries/RANKED_SOLO_5x5/DIAMOND/II?page=2',
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
        $result = $league->getByQueueAndTierAndDivision(
            QueueEnum::RANKED_SOLO_5x5(),
            TierExpEnum::DIAMOND(),
            DivisionEnum::II(),
            RegionEnum::EUN1(),
            2
        );
        self::assertInstanceOf(LeagueEntryDTOCollection::class, $result);
    }
}
