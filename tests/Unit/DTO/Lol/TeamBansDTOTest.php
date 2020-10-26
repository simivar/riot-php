<?php

declare(strict_types=1);

namespace Riot\Tests\Unit\DTO\Lol;

use PHPUnit\Framework\TestCase;
use Riot\DTO\Lol\TeamBansDTO;

final class TeamBansDTOTest extends TestCase
{
    public function testCreateFromArrayCreatesProperObject(): void
    {
        $data = [
            'championId' => 555,
            'pickTurn' => 1,
        ];
        $object = TeamBansDTO::createFromArray($data);
        self::assertSame(555, $object->getChampionId());
        self::assertSame(1, $object->getPickTurn());
    }
}
