<?php

declare(strict_types=1);

namespace Riot\Tests\Unit\DTO;

use PHPUnit\Framework\TestCase;
use Riot\Collection\LorPlayerDTOCollection;
use Riot\DTO\InfoDTO;

final class InfoDTOTest extends TestCase
{
    public function testCreateFromArrayCreatesProperObject(): void
    {
        $data = [
            'game_mode' => 'Constructed',
            'game_type' => 'Normal',
            'game_start_time_utc' => '2020-10-24T01:35:27.6191820+00:00',
            'game_version' => 'live_1_12_12',
            'players' => [],
            'total_turn_count' => 15,
        ];
        $object = InfoDTO::createFromArray($data);
        self::assertSame('Constructed', $object->getGameMode());
        self::assertSame('Normal', $object->getGameType());
        self::assertSame('2020-10-24T01:35:27.6191820+00:00', $object->getGameStartTimeUtc());
        self::assertSame('live_1_12_12', $object->getGameVersion());
        self::assertInstanceOf(LorPlayerDTOCollection::class, $object->getPlayers());
        self::assertSame(15, $object->getTotalTurnCount());
    }
}
