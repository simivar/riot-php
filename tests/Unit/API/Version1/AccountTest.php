<?php

declare(strict_types=1);

namespace Tests\Riot\Unit\API\Version1;

use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use Riot\API\Version1\Account;
use Riot\ConnectionInterface;
use Riot\DTO\AccountDTO;
use Riot\DTO\ActiveShardDTO;

final class AccountTest extends TestCase
{
    private function setUpJsonResponse(string $path, string $apiResponse): ConnectionInterface
    {
        $stream = $this->createMock(StreamInterface::class);
        $stream->expects(self::once())
            ->method('getContents')
            ->willReturn($apiResponse)
        ;

        $response = $this->createMock(ResponseInterface::class);
        $response->expects(self::once())
            ->method('getBody')
            ->willReturn($stream)
        ;

        $riotConnection = $this->createMock(ConnectionInterface::class);
        $riotConnection->expects(self::once())
            ->method('get')
            ->with(self::equalTo('europe'), self::equalTo($path))
            ->willReturn($response)
        ;

        return $riotConnection;
    }

    public function testGetByPuuidReturnsAccountDTOOnSuccess(): void
    {
        $summoner = new Account($this->setUpJsonResponse(
            'riot/account/v1/accounts/by-puuid/1',
            '{"puuid": "1","gameName": "2","tagLine": "3"}'),
        );
        $result = $summoner->getByPuuid('1', 'europe');
        self::assertInstanceOf(AccountDTO::class, $result);
    }

    public function testGetByGameNameAndTagLineReturnsAccountDTOOnSuccess(): void
    {
        $summoner = new Account($this->setUpJsonResponse(
            '/riot/account/v1/accounts/by-riot-id/1/2',
            '{"puuid": "1","gameName": "2","tagLine": "3"}'
        ));
        $result = $summoner->getByGameNameAndTagLine('1', '2', 'europe');
        self::assertInstanceOf(AccountDTO::class, $result);
    }

    public function testGetByGameAndPuuidReturnsActiveShardDTOOnSuccess(): void
    {
        $summoner = new Account($this->setUpJsonResponse(
            '/riot/account/v1/active-shards/by-game/1/by-puuid/2',
            '{"puuid": "1","game": "2","activeShard": "3"}'
        ));
        $result = $summoner->getByGameAndPuuid('1', '2', 'europe');
        self::assertInstanceOf(ActiveShardDTO::class, $result);
    }
}
