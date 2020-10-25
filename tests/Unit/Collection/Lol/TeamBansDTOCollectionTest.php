<?php

declare(strict_types=1);

namespace Riot\Tests\Unit\DTO\Lol;

use PHPUnit\Framework\TestCase;
use Riot\Collection\Lol\TeamBansDTOCollection;
use Riot\DTO\Lol\TeamBansDTO;

final class TeamBansDTOCollectionTest extends TestCase
{
    public function testCreateFromArrayCreatesProperObject(): void
    {
        $data = [
            [
                'championId' => 555,
                'pickTurn' => 1,
            ],
        ];
        $object = TeamBansDTOCollection::createFromArray($data);
        self::assertFalse($object->isEmpty());
        self::assertInstanceOf(TeamBansDTO::class, $object->offsetGet(0));
    }

    public function testCreateFromArrayReturnsEmptyCollectionWhenNoData(): void
    {
        $data = [];
        $object = TeamBansDTOCollection::createFromArray($data);
        self::assertTrue($object->isEmpty());
    }
}
