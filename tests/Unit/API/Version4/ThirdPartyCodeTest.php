<?php

declare(strict_types=1);

namespace Riot\Tests\API\Version4;

use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use Riot\API\Version4\ThirdPartyCode;
use Riot\ConnectionInterface;

final class ThirdPartyCodeTest extends TestCase
{
    public function testGetBySummonerIdReturnsNullOnGetNull(): void
    {
        $riotConnection = $this->createMock(ConnectionInterface::class);
        $riotConnection->expects(self::once())
            ->method('get')
            ->with(
                self::equalTo('eun1'),
                self::equalTo('lol/platform/v4/third-party-code/by-summoner/simivar')
            )
            ->willReturn(null)
        ;

        $summoner = new ThirdPartyCode($riotConnection);
        $result = $summoner->getBySummonerId('simivar', 'eun1');
        self::assertNull($result);
    }

    public function testGetBySummonerIdReturnsStringOnSuccess(): void
    {
        $apiResponse = '"test"';

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
            ->with(
                self::equalTo('eun1'),
                self::equalTo('lol/platform/v4/third-party-code/by-summoner/simivar')
            )
            ->willReturn($response)
        ;

        $summoner = new ThirdPartyCode($riotConnection);
        $result = $summoner->getBySummonerId('simivar', 'eun1');
        self::assertSame('test', $result);
    }
}
