<?php

declare(strict_types=1);

namespace Riot\Tests\Unit\DTO\Lol;

use PHPUnit\Framework\TestCase;
use Riot\DTO\Lol\MatchReferenceDTO;

final class MatchReferenceDTOTest extends TestCase
{
    public function testCreateFromArrayCreatesProperObject(): void
    {
        $data = [
            'platformId' => 'EUN1',
            'gameId' => 1234567890,
            'champion' => 67,
            'queue' => 400,
            'season' => 13,
            'timestamp' => 1589831548235,
            'role' => 'DUO_CARRY',
            'lane' => 'BOTTOM',
        ];
        $object = MatchReferenceDTO::createFromArray($data);
        self::assertSame('EUN1', $object->getPlatformId());
        self::assertSame(1234567890, $object->getGameId());
        self::assertSame(67, $object->getChampion());
        self::assertSame(400, $object->getQueue());
        self::assertSame(13, $object->getSeason());
        self::assertSame(1589831548235, $object->getTimestamp());
        self::assertSame('DUO_CARRY', $object->getRole());
        self::assertSame('BOTTOM', $object->getLane());
    }
}
