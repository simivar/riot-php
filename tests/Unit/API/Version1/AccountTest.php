<?php

declare(strict_types=1);

namespace Tests\Riot\Unit\API\Version1;

use Riot\API\Version1\Account;
use Riot\DTO\AccountDTO;
use Riot\DTO\ActiveShardDTO;
use Riot\Tests\APITestCase;

final class AccountTest extends APITestCase
{
    public function testGetByPuuidReturnsAccountDTOOnSuccess(): void
    {
        $summoner = new Account($this->createConnectionMock(
            'riot/account/v1/accounts/by-puuid/1',
            '{"puuid": "1","gameName": "2","tagLine": "3"}'),
        );
        $result = $summoner->getByPuuid('1', 'eun1');
        self::assertInstanceOf(AccountDTO::class, $result);
    }

    public function testGetByGameNameAndTagLineReturnsAccountDTOOnSuccess(): void
    {
        $summoner = new Account($this->createConnectionMock(
            'riot/account/v1/accounts/by-riot-id/1/2',
            '{"puuid": "1","gameName": "2","tagLine": "3"}'
        ));
        $result = $summoner->getByGameNameAndTagLine('1', '2', 'eun1');
        self::assertInstanceOf(AccountDTO::class, $result);
    }

    public function testGetByGameAndPuuidReturnsActiveShardDTOOnSuccess(): void
    {
        $summoner = new Account($this->createConnectionMock(
            'riot/account/v1/active-shards/by-game/1/by-puuid/2',
            '{"puuid": "1","game": "2","activeShard": "3"}'
        ));
        $result = $summoner->getByGameAndPuuid('1', '2', 'eun1');
        self::assertInstanceOf(ActiveShardDTO::class, $result);
    }
}
