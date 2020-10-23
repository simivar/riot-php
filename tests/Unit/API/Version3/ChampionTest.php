<?php

declare(strict_types=1);

namespace Tests\Riot\Unit\API\Version3;

use Riot\API\Version3\Champion;
use Riot\DTO\ChampionInfoDTO;
use Riot\Tests\APITestCase;

final class ChampionTest extends APITestCase
{
    public function testGetByPuuidReturnsAccountDTOOnSuccess(): void
    {
        $summoner = new Champion($this->createConnectionMock(
            'lol/platform/v3/champion-rotations',
            '{
                "freeChampionIds": [1],
                "freeChampionIdsForNewPlayers": [18],
                "maxNewPlayerLevel": 10
            }'),
        );
        $result = $summoner->getChampionRotations('eun1');
        self::assertInstanceOf(ChampionInfoDTO::class, $result);
    }
}
