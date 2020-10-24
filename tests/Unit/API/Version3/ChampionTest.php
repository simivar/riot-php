<?php

declare(strict_types=1);

namespace Tests\Riot\Unit\API\Version3;

use Riot\API\Version3\Champion;
use Riot\DTO\ChampionInfoDTO;
use Riot\Enum\RegionEnum;
use Riot\Tests\APITestCase;

final class ChampionTest extends APITestCase
{
    public function testGetByPuuidReturnsAccountDTOOnSuccess(): void
    {
        $champion = new Champion($this->createObjectConnectionMock(
            'lol/platform/v3/champion-rotations',
            [
                'maxNewPlayerLevel' => 10,
                'freeChampionIds' => [1, 6],
                'freeChampionIdsForNewPlayers' => [18, 81],
            ]
        ));
        $result = $champion->getChampionRotations(RegionEnum::EUN1());
        self::assertInstanceOf(ChampionInfoDTO::class, $result);
    }
}
