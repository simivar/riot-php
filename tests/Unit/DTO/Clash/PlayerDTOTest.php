<?php

declare(strict_types=1);

namespace Riot\Tests\Unit\DTO\Clash;

use PHPUnit\Framework\TestCase;
use Riot\DTO\Clash\PlayerDTO;
use Riot\Enum\PositionEnum;
use Riot\Enum\TeamRoleEnum;

final class PlayerDTOTest extends TestCase
{
    public function testCreateFromArrayCreatesProperObject(): void
    {
        $data = [
            'summonerId' => '1',
            'teamId' => '2',
            'position' => 'FILL',
            'role' => 'CAPTAIN',
        ];
        $object = PlayerDTO::createFromArray($data);
        self::assertSame('1', $object->getSummonerId());
        self::assertSame('2', $object->getTeamId());
        self::assertInstanceOf(PositionEnum::class, $object->getPosition());
        self::assertSame('FILL', $object->getPosition()->getValue());
        self::assertInstanceOf(TeamRoleEnum::class, $object->getRole());
        self::assertSame('CAPTAIN', $object->getRole()->getValue());
    }
}
