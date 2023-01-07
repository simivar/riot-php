<?php

declare(strict_types=1);

namespace Riot\Tests\Unit\DTO\Lol;

use PHPUnit\Framework\TestCase;
use Riot\Collection\Lol\MatchReferenceDTOCollection;
use Riot\DTO\Lol\MatchlistDTO;

final class MatchlistDTOTest extends TestCase
{
    public function testCreateFromArrayCreatesProperObject(): void
    {
        $data = [];
        $object = MatchlistDTO::createFromArray($data);
        self::assertInstanceOf(MatchReferenceDTOCollection::class, $object->getMatches());
    }
}
