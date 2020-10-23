<?php

declare(strict_types=1);

namespace Riot\Tests\Unit\DTO;

use PHPUnit\Framework\TestCase;
use Riot\DTO\PlayerDTO;

final class PlayerDTOTest extends TestCase
{
    public function testCreateFromArrayCreatesProperObject(): void
    {
        $data = [
            'name' => 'Player One',
            'rank' => 0,
            'lp' => 367,
        ];
        $object = PlayerDTO::createFromArray($data);
        self::assertSame('Player One', $object->getName());
        self::assertSame(0, $object->getRank());
        self::assertSame(367, $object->getLp());
    }
}
