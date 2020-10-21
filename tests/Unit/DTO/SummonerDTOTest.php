<?php

declare(strict_types=1);

namespace Riot\Tests\Unit\DTO;

use PHPUnit\Framework\TestCase;
use Riot\DTO\SummonerDTO;

final class SummonerDTOTest extends TestCase
{
    public function testCreateFromArrayCreatesProperObject(): void
    {
        $data = [
            'accountId' => '1',
            'profileIconId' => 2,
            'revisionDate' => 3,
            'name' => '4',
            'id' => '5',
            'puuid' => '6',
            'summonerLevel' => 7,
        ];
        $object = SummonerDTO::createFromArray($data);
        self::assertEquals('1', $object->getAccountId());
        self::assertEquals(2, $object->getProfileIconId());
        self::assertEquals(3, $object->getRevisionDate());
        self::assertEquals('4', $object->getName());
        self::assertEquals('5', $object->getId());
        self::assertEquals('6', $object->getPuuid());
        self::assertEquals(7, $object->getSummonerLevel());
    }
}
