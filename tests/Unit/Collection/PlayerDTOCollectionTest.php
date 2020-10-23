<?php

declare(strict_types=1);

namespace Riot\Tests\Unit\DTO;

use PHPUnit\Framework\TestCase;
use Riot\Collection\PlayerDTOCollection;
use Riot\DTO\PlayerDTO;

final class PlayerDTOCollectionTest extends TestCase
{
    public function testCreateFromArrayCreatesProperObject(): void
    {
        $data = [
            'players' => [
                'name' => 'Player One',
                'rank' => 0,
                'lp' => 367,
            ],
        ];
        $object = PlayerDTOCollection::createFromArray($data);
        self::assertFalse($object->isEmpty());
        self::assertInstanceOf(PlayerDTO::class, $object->offsetGet(0));
    }

    public function testCreateFromArrayReturnsEmptyCollectionWhenNoData(): void
    {
        $data = [];
        $object = PlayerDTOCollection::createFromArray($data);
        self::assertTrue($object->isEmpty());
    }
}
