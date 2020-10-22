<?php

declare(strict_types=1);

namespace Riot\Tests\Unit\DTO;

use PHPUnit\Framework\TestCase;
use Riot\DTO\ChampionMasteryDTO;

final class ChampionMasteryDTOTest extends TestCase
{
    public function testCreateFromArrayCreatesProperObject(): void
    {
        $data = [
            'championId' => 80,
            'championLevel' => 1,
            'championPoints' => 719,
            'lastPlayTime' => 1581627749000,
            'championPointsSinceLastLevel' => 719,
            'championPointsUntilNextLevel' => 1081,
            'chestGranted' => false,
            'tokensEarned' => 0,
            'summonerId' => 'some_id',
        ];
        $object = ChampionMasteryDTO::createFromArray($data);
        self::assertEquals(80, $object->getChampionId());
        self::assertEquals(1, $object->getChampionLevel());
        self::assertEquals(719, $object->getChampionPoints());
        self::assertEquals(1581627749000, $object->getLastPlayTime());
        self::assertEquals(719, $object->getChampionPointsSinceLastLevel());
        self::assertEquals(1081, $object->getChampionPointsUntilNextLevel());
        self::assertEquals(false, $object->isChestGranted());
        self::assertEquals(0, $object->getTokensEarned());
        self::assertEquals('some_id', $object->getSummonerId());
    }
}
