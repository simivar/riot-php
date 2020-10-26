<?php

declare(strict_types=1);

namespace Riot\Tests\Unit\DTO\Lol;

use PHPUnit\Framework\TestCase;
use Riot\DTO\Lol\MasteryDTO;

final class MasteryDTOTest extends TestCase
{
    public function testCreateFromArrayCreatesProperObject(): void
    {
        $data = [
            'rank' => 1,
            'masteryId' => 2,
        ];
        $object = MasteryDTO::createFromArray($data);
        self::assertSame(1, $object->getRank());
        self::assertSame(2, $object->getMasteryId());
    }
}
