<?php

declare(strict_types=1);

namespace Unit\DTO\Lol;

use PHPUnit\Framework\TestCase;
use Riot\DTO\Lol\PlayerDTO;

final class PlayerDTOTest extends TestCase
{
    public function testCreateFromArrayCreatesProperObject(): void
    {
        $data = [
            'platformId' => 'EUN1',
            'accountId' => 'account-id',
            'summonerName' => 'Player One',
            'summonerId' => 'summoner-id',
            'currentPlatformId' => 'EUN1',
            'currentAccountId' => 'current-account-id',
            'matchHistoryUri' => '/v1/stats/player_history/EUN1/1',
            'profileIcon' => 4787,
        ];
        $object = PlayerDTO::createFromArray($data);
        self::assertSame('EUN1', $object->getPlatformId());
        self::assertSame('account-id', $object->getAccountId());
        self::assertSame('Player One', $object->getSummonerName());
        self::assertSame('summoner-id', $object->getSummonerId());
        self::assertSame('EUN1', $object->getCurrentPlatformId());
        self::assertSame('current-account-id', $object->getCurrentAccountId());
        self::assertSame('/v1/stats/player_history/EUN1/1', $object->getMatchHistoryUri());
        self::assertSame(4787, $object->getProfileIcon());
    }
}
