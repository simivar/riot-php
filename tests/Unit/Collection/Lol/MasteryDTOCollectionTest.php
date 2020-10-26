<?php

declare(strict_types=1);

namespace Riot\Tests\Unit\DTO\Lol;

use PHPUnit\Framework\TestCase;
use Riot\Collection\Lol\MasteryDTOCollection;
use Riot\DTO\Lol\MasteryDTO;

final class MasteryDTOCollectionTest extends TestCase
{
    public function testCreateFromArrayCreatesProperObject(): void
    {
        $data = [
            [
                'rank' => 1,
                'masteryId' => 2,
            ],
        ];
        $object = MasteryDTOCollection::createFromArray($data);
        self::assertFalse($object->isEmpty());
        self::assertInstanceOf(MasteryDTO::class, $object->offsetGet(0));
    }

    public function testCreateFromArrayReturnsEmptyCollectionWhenNoData(): void
    {
        $data = [];
        $object = MasteryDTOCollection::createFromArray($data);
        self::assertTrue($object->isEmpty());
    }
}
