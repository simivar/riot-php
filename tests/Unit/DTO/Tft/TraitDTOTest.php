<?php

declare(strict_types=1);

namespace Riot\Tests\Unit\DTO\Tft;

use PHPUnit\Framework\TestCase;
use Riot\DTO\Tft\TraitDTO;
use Riot\Enum\Tft\TraitStyleEnum;

final class TraitDTOTest extends TestCase
{
    public function testCreateFromArrayCreatesProperObject(): void
    {
        $data = [
            'name' => 'Duelist',
            'num_units' => 1,
            'style' => 0,
            'tier_current' => 2,
            'tier_total' => 3,
        ];
        $object = TraitDTO::createFromArray($data);
        self::assertSame('Duelist', $object->getName());
        self::assertSame(1, $object->getNumUnits());
        self::assertInstanceOf(TraitStyleEnum::class, $object->getStyle());
        self::assertSame(0, $object->getStyle()->getValue());
        self::assertSame(2, $object->getTierCurrent());
        self::assertSame(3, $object->getTierTotal());
    }
}
