<?php

declare(strict_types=1);

namespace Tests\Riot\Unit\API\Version1;

use Riot\API\Version1\LorRanked;
use Riot\DTO\LeaderboardDTO;
use Riot\Enum\GeoRegionEnum;
use Riot\Tests\APITestCase;

final class LorRankedTest extends APITestCase
{
    public function testGetLeaderboardsReturnsAccountDTOOnSuccess(): void
    {
        $lorRanked = new LorRanked($this->createObjectConnectionMock(
            'lor/ranked/v1/leaderboards',
            [
                'players' => [],
            ],
            'europe',
        ));
        $result = $lorRanked->getLeaderboards(GeoRegionEnum::EUROPE());
        self::assertInstanceOf(LeaderboardDTO::class, $result);
    }
}
