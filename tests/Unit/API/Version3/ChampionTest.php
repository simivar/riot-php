<?php

declare(strict_types=1);

namespace Tests\Riot\Unit\API\Version3;

use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use Riot\API\Version3\Champion;
use Riot\ConnectionInterface;
use Riot\DTO\ChampionInfoDTO;

final class ChampionTest extends TestCase
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
            ->with(self::equalTo('eun1'), self::equalTo($path))
            ->willReturn($response)
        ;

        return $riotConnection;
    }

    public function testGetByPuuidReturnsAccountDTOOnSuccess(): void
    {
        $summoner = new Champion($this->setUpJsonResponse(
            '/lol/platform/v3/champion-rotations',
            '{
                "freeChampionIds": [1],
                "freeChampionIdsForNewPlayers": [18],
                "maxNewPlayerLevel": 10
            }'),
        );
        $result = $summoner->getChampionRotations('eun1');
        self::assertInstanceOf(ChampionInfoDTO::class, $result);
    }
}
