<?php

declare(strict_types=1);

namespace Riot\Tests\Unit\DTO\Lol;

use PHPUnit\Framework\TestCase;
use Riot\Collection\Lol\MatchFrameDTOCollection;
use Riot\DTO\Lol\MatchFrameDTO;

final class MatchFrameDTOCollectionTest extends TestCase
{
    public function testCreateFromArrayCreatesProperObject(): void
    {
        $data = [
            [
                'participantFrames' => [],
                'events' => [],
                'timestamp' => 180075,
            ]
        ];
        $object = MatchFrameDTOCollection::createFromArray($data);
        self::assertFalse($object->isEmpty());
        self::assertInstanceOf(MatchFrameDTO::class, $object->offsetGet(0));
    }

    public function testCreateFromArrayReturnsEmptyCollectionWhenNoData(): void
    {
        $data = [];
        $object = MatchFrameDTOCollection::createFromArray($data);
        self::assertTrue($object->isEmpty());
    }
}
