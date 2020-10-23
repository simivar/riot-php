<?php

declare(strict_types=1);

namespace Tests\Riot\Unit\API\Version3;

use Riot\API\Version3\Champion;
use Riot\API\Version3\LolStatus;
use Riot\DTO\ChampionInfoDTO;
use Riot\DTO\ShardStatusDTO;
use Riot\Tests\APITestCase;

final class LolStatusTest extends APITestCase
{
    public function testGetByPuuidReturnsAccountDTOOnSuccess(): void
    {
        $lolStatus = new LolStatus($this->createConnectionMock(
            'lol/status/v3/shard-data',
            '{
    "name": "EU Nordic & East",
    "slug": "eune",
    "locales": [
        "en_PL"
    ],
    "hostname": "prod.eun1.lol.riotgames.com",
    "region_tag": "eun1",
    "services": [
        {
            "name": "Game",
            "slug": "game",
            "status": "online",
            "incidents": [
                {
                    "id": 14377,
                    "active": true,
                    "created_at": "2020-01-22T02:27:02.532Z",
                    "updates": [
                        {
                            "id": "5e27b2f68d0391127f333f21",
                            "author": "",
                            "heading": "10.02",
                            "content": "On 23/01/20, starting at 01:30 CET (00:30 UTC)",
                            "severity": "info",
                            "created_at": "2020-01-22T02:27:02.532Z",
                            "updated_at": "2020-01-22T02:27:02.532Z",
                            "translations": [
                                {
                                    "locale": "pl_PL",
                                    "heading": "10.02",
                                    "content": "Dnia 23/01/20, od godz. 01:30 czasu polskiego (00:30 UTC)"
                                }
                            ]
                        }
                    ]
                }
            ]
        },
        {
            "name": "Store",
            "slug": "store",
            "status": "online",
            "incidents": []
        },
        {
            "name": "Website",
            "slug": "website",
            "status": "online",
            "incidents": []
        },
        {
            "name": "Client",
            "slug": "client",
            "status": "online",
            "incidents": []
        }
    ]
}',
        ));
        $result = $lolStatus->getShardData('eun1');
        self::assertInstanceOf(ShardStatusDTO::class, $result);
    }
}
