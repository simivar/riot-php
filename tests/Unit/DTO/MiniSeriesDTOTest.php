<?php

declare(strict_types=1);

namespace Riot\Tests\Unit\DTO;

use PHPUnit\Framework\TestCase;
use Riot\DTO\MiniSeriesDTO;

final class MiniSeriesDTOTest extends TestCase
{
    public function testCreateFromArrayCreatesProperObject(): void
    {
        $data = [
            'losses' => 1,
            'progress' => 'WNN',
            'target' => 2,
            'wins' => 3,
        ];
        $object = MiniSeriesDTO::createFromArray($data);
        self::assertSame(1, $object->getLosses());
        self::assertSame('WNN', $object->getProgress());
        self::assertSame(2, $object->getTarget());
        self::assertSame(3, $object->getWins());
    }
}
