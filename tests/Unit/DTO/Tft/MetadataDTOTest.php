<?php

declare(strict_types=1);

namespace Riot\Tests\Unit\DTO\Tft;

use PHPUnit\Framework\TestCase;
use Riot\DTO\Tft\MetadataDTO;

final class MetadataDTOTest extends TestCase
{
    public function testCreateFromArrayCreatesProperObject(): void
    {
        $data = [
            'data_version' => '5',
            'match_id' => 'EUN1_1234567890',
            'participants' => [
                'nPGa0ert2F9b86uoIa_Ho9gB49sSG-TEG-P7ertBlmA5Jaqgt6ove_129ertKbjaqBoertovOuxRcw',
            ],
        ];
        $object = MetadataDTO::createFromArray($data);
        self::assertSame('5', $object->getDataVersion());
        self::assertSame('EUN1_1234567890', $object->getMatchId());
        self::assertIsArray($object->getParticipants());
        self::assertCount(1, $object->getParticipants());
        self::assertSame(
            'nPGa0ert2F9b86uoIa_Ho9gB49sSG-TEG-P7ertBlmA5Jaqgt6ove_129ertKbjaqBoertovOuxRcw',
            $object->getParticipants()[0],
        );
    }
}
