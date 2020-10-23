<?php

declare(strict_types=1);

namespace Riot\Tests\Unit\DTO;

use PHPUnit\Framework\TestCase;
use Riot\Collection\PlayerDTOCollection;
use Riot\DTO\LeaderboardDTO;
use Riot\DTO\PlayerDTO;

final class LeaderboardDTOTest extends TestCase
{
    public function testCreateFromArrayCreatesProperObject(): void
    {
        $data = [
            'players' => [],
        ];
        $object = LeaderboardDTO::createFromArray($data);
        self::assertInstanceOf(PlayerDTOCollection::class, $object->getPlayers());
    }
}
