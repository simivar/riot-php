<?php

declare(strict_types=1);

namespace Riot\Tests\Unit\DTO\Clash;

use PHPUnit\Framework\TestCase;
use Riot\Collection\Clash\PlayerDTOCollection;
use Riot\DTO\Clash\TeamDTO;

final class TeamDTOTest extends TestCase
{
    public function testCreateFromArrayCreatesProperObject(): void
    {
        $data = [
            'id' => '1',
            'tournamentId' => 2,
            'name' => 'Team One',
            'iconId' => 3,
            'tier' => 4,
            'captain' => 'summoner-id',
            'abbreviation' => 'abbrv',
            'players' => [],
        ];
        $object = TeamDTO::createFromArray($data);
        self::assertSame('1', $object->getId());
        self::assertSame(2, $object->getTournamentId());
        self::assertSame('Team One', $object->getName());
        self::assertSame(3, $object->getIconId());
        self::assertSame(4, $object->getTier());
        self::assertSame('summoner-id', $object->getCaptain());
        self::assertSame('abbrv', $object->getAbbreviation());
        self::assertInstanceOf(PlayerDTOCollection::class, $object->getPlayers());
    }
}
