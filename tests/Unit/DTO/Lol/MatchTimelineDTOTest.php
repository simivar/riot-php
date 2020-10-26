<?php

declare(strict_types=1);

namespace Riot\Tests\Unit\DTO\Lol;

use PHPUnit\Framework\TestCase;
use Riot\Collection\Lol\MatchFrameDTOCollection;
use Riot\DTO\Lol\MatchTimelineDTO;

final class MatchTimelineDTOTest extends TestCase
{
    public function testCreateFromArrayCreatesProperObject(): void
    {
        $data = [
            'frames' => [],
            'frameInterval' => 60000,
        ];
        $object = MatchTimelineDTO::createFromArray($data);
        self::assertInstanceOf(MatchFrameDTOCollection::class, $object->getFrames());
        self::assertSame(60000, $object->getFrameInterval());
    }
}
