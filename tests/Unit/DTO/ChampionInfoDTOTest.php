<?php

declare(strict_types=1);

namespace Riot\Tests\Unit\DTO;

use PHPUnit\Framework\TestCase;
use Riot\DTO\ChampionInfoDTO;

final class ChampionInfoDTOTest extends TestCase
{
    public function testCreateFromArrayCreatesProperObject(): void
    {
        $data = [
            'maxNewPlayerLevel' => 10,
            'freeChampionIds' => [1, 6],
            'freeChampionIdsForNewPlayers' => [18, 81],
        ];
        $object = ChampionInfoDTO::createFromArray($data);
        self::assertSame(10, $object->getMaxNewPlayerLevel());
        self::assertSame([1, 6], $object->getFreeChampionIds());
        self::assertSame([18, 81], $object->getFreeChampionIdsForNewPlayers());
    }
}
