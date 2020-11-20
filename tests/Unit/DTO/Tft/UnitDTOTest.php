<?php

declare(strict_types=1);

namespace Riot\Tests\Unit\DTO\Tft;

use PHPUnit\Framework\TestCase;
use Riot\DTO\Tft\UnitDTO;

final class UnitDTOTest extends TestCase
{
    public function testCreateFromArrayCreatesProperObject(): void
    {
        $data = [
            'character_id' => 'TFT4_Elise',
            'items' => [
                8,
            ],
            'name' => '',
            'rarity' => 0,
            'tier' => 1,
        ];
        $object = UnitDTO::createFromArray($data);
        self::assertSame('TFT4_Elise', $object->getCharacterId());
        self::assertIsArray($object->getItems());
        self::assertCount(1, $object->getItems());
        self::assertSame(8, $object->getItems()[0]);
        self::assertSame('', $object->getName());
        self::assertSame(0, $object->getRarity());
        self::assertSame(1, $object->getTier());
    }
}
