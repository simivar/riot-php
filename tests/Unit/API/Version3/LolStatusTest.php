<?php

declare(strict_types=1);

namespace Tests\Riot\Unit\API\Version3;

use Riot\API\Version3\LolStatus;
use Riot\DTO\ShardStatusDTO;
use Riot\Enum\RegionEnum;
use Riot\Tests\APITestCase;

final class LolStatusTest extends APITestCase
{
    public function testGetByPuuidReturnsAccountDTOOnSuccess(): void
    {
        $lolStatus = new LolStatus($this->createObjectConnectionMock(
            'lol/status/v3/shard-data',
            [
                'locales' => [
                    'pl_PL',
                ],
                'hostname' => 'host.test',
                'name' => 'Name',
                'services' => [],
                'slug' => 'host-test',
                'region_tag' => 'region',
            ],
            'eun1'
        ));
        $result = $lolStatus->getShardData(RegionEnum::EUN1());
        self::assertInstanceOf(ShardStatusDTO::class, $result);
    }
}
