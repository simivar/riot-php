<?php

declare(strict_types=1);

namespace Riot\Tests\Unit\DTO\Lol;

use PHPUnit\Framework\TestCase;
use Riot\Collection\Lol\RuneDTOCollection;
use Riot\DTO\Lol\RuneDTO;

final class RuneDTOCollectionTest extends TestCase
{
    public function testCreateFromArrayCreatesProperObject(): void
    {
        $data = [
            [
                'runeId' => 1,
                'rank' => 2,
            ],
        ];
        $object = RuneDTOCollection::createFromArray($data);
        self::assertFalse($object->isEmpty());
        self::assertInstanceOf(RuneDTO::class, $object->offsetGet(0));
    }

    public function testCreateFromArrayReturnsEmptyCollectionWhenNoData(): void
    {
        $data = [];
        $object = RuneDTOCollection::createFromArray($data);
        self::assertTrue($object->isEmpty());
    }
}
