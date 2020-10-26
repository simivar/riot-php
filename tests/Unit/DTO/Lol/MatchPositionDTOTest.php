<?php

declare(strict_types=1);

namespace Riot\Tests\Unit\DTO\Lol;

use PHPUnit\Framework\TestCase;
use Riot\DTO\Lol\MatchPositionDTO;

final class MatchPositionDTOTest extends TestCase
{
    public function testCreateFromArrayCreatesProperObject(): void
    {
        $data = [
            'x' => 12871,
            'y' => 2926,
        ];
        $object = MatchPositionDTO::createFromArray($data);
        self::assertSame(12871, $object->getX());
        self::assertSame(2926, $object->getY());
    }
}
