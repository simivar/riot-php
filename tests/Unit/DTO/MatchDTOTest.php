<?php

declare(strict_types=1);

namespace Riot\Tests\Unit\DTO;

use PHPUnit\Framework\TestCase;
use Riot\DTO\InfoDTO;
use Riot\DTO\MatchDTO;
use Riot\DTO\MetadataDTO;

final class MatchDTOTest extends TestCase
{
    public function testCreateFromArrayCreatesProperObject(): void
    {
        $data = [
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
        ];
        $object = MatchDTO::createFromArray($data);
        self::assertInstanceOf(MetadataDTO::class, $object->getMetadata());
        self::assertInstanceOf(InfoDTO::class, $object->getInfo());
    }
}
