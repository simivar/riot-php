<?php

declare(strict_types=1);

namespace Riot\Tests\Unit\DTO\Tft;

use PHPUnit\Framework\TestCase;
use Riot\DTO\Tft\InfoDTO;
use Riot\DTO\Tft\MatchDTO;
use Riot\DTO\Tft\MetadataDTO;

final class MatchDTOTest extends TestCase
{
    public function testCreateFromArrayCreatesProperObject(): void
    {
        $data = [
            'metadata' => [
                'data_version' => '5',
                    'match_id' => 'EUN1_2649643831',
                    'participants' => [
                    'nPGa0ert2F9b86uoIa_Ho9gB49sSG-TEG-P7ertBlmA5Jaqgt6ove_129ertKbjaqBoertovOuxRcw',
                ],
            ],
            'info' => [
                'game_datetime' => 1605820001234,
                'game_length' => 1234.362060546875,
                'game_version' => 'Version 10.23.343.2581 (Nov 06 2020/11:12:26) [PUBLIC] <Releases/10.23>',
                'participants' => [],
                'queue_id' => 1090,
                'tft_set_number' => 4,
            ],
        ];
        $object = MatchDTO::createFromArray($data);
        self::assertInstanceOf(MetadataDTO::class, $object->getMetadata());
        self::assertInstanceOf(InfoDTO::class, $object->getInfo());
    }
}
