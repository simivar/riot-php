<?php

declare(strict_types=1);

namespace Tests\Riot\Unit\API\Version1;

use Riot\API\Version1\LorMatch;
use Riot\DTO\Lor\MatchDTO;
use Riot\Enum\GeoRegionEnum;
use Riot\Tests\APITestCase;

final class LorMatchTest extends APITestCase
{
    public function testGetIdsByPuuidReturnsMatchDTOOnSuccess(): void
    {
        $lorMatch = new LorMatch($this->createObjectConnectionMock(
            'lor/match/v1/matches/by-puuid/1/ids',
            [
                '1888057d-42b7-41b7-a4cc-b29d1bb8ae96',
                '3b3d9843-d0fc-4cf5-9c91-ca4dd1c80be1',
                '60850f1e-bd55-4253-bfd1-e7602c352318',
                '025348b8-f9d5-434f-a5dc-ac67ba93c813',
                'af791950-7701-485b-86bb-199451f7a906',
                '5d2b6f91-5436-4f30-a8b5-3b8c5911040b',
            ],
            'europe',
        ));
        $result = $lorMatch->getIdsByPuuid('1', GeoRegionEnum::EUROPE());
        self::assertIsArray($result);
        self::assertArrayHasKey(0, $result);
        self::assertSame('1888057d-42b7-41b7-a4cc-b29d1bb8ae96', $result[0]);
    }

    public function testGetByIddReturnsMatchDTOOnSuccess(): void
    {
        $lorMatch = new LorMatch($this->createObjectConnectionMock(
            'lor/match/v1/matches/1',
            [
                'metadata' => [
                    'data_version' => '2',
                    'match_id' => '1888057d-42b7-41b7-a4cc-b29d1bb8ae96',
                    'participants' => [
                        'nyhu013f99qdPsswfrbER4CURy3iz6vkdrN1sF6-ApDMgsocqU9L1GEFNadd6yKr_uK_s7RPNZi_qg',
                        '7NpyGDlekYIvEUBs_LNeYeDu1PWIcZPLHWpgtji3zJTFRAKEtub8ewBBc4Ag7hOpL5EEt0Sd0njgbg',
                    ],
                ],
                'info' => [
                    'game_mode' => 'Constructed',
                    'game_type' => 'Normal',
                    'game_start_time_utc' => '2020-10-24T01:35:27.6191820+00:00',
                    'game_version' => 'live_1_12_12',
                    'players' => [],
                    'total_turn_count' => 15,
                ],
            ],
            'europe',
        ));
        $result = $lorMatch->getById('1', GeoRegionEnum::EUROPE());
        self::assertInstanceOf(MatchDTO::class, $result);
    }
}
