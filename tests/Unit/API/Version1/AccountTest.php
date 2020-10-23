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
        $account = new Account($this->createObjectConnectionMock(
            'riot/account/v1/accounts/by-puuid/1',
            [
                'puuid' => 'a1',
                'gameName' => 'b2',
                'tagLine' => 'EUNE',
            ]
        ));
        $result = $account->getByPuuid('1', 'eun1');
        self::assertInstanceOf(AccountDTO::class, $result);
    }

    public function testGetByGameNameAndTagLineReturnsAccountDTOOnSuccess(): void
    {
        $account = new Account($this->createObjectConnectionMock(
            'riot/account/v1/accounts/by-riot-id/1/2',
            [
                'puuid' => 'a1',
                'gameName' => 'b2',
                'tagLine' => 'EUNE',
            ]
        ));
        $result = $account->getByGameNameAndTagLine('1', '2', 'eun1');
        self::assertInstanceOf(AccountDTO::class, $result);
    }

    public function testGetByGameAndPuuidReturnsActiveShardDTOOnSuccess(): void
    {
        $account = new Account($this->createObjectConnectionMock(
            'riot/account/v1/active-shards/by-game/1/by-puuid/2',
            [
                'puuid' => 'a1',
                'game' => 'b2',
                'activeShard' => 'c3',
            ]
        ));
        $result = $account->getByGameAndPuuid('1', '2', 'eun1');
        self::assertInstanceOf(ActiveShardDTO::class, $result);
    }
}
