<?php

declare(strict_types=1);

namespace Riot\Tests;

use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use Riot\API\ResponseDecoderInterface;
use Riot\ConnectionInterface;

class APITestCase extends TestCase
{
    protected function createConnectionMock(string $path, string $apiResponse): ConnectionInterface
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

        $riotResponse = $this->createMock(ResponseDecoderInterface::class);
        $riotResponse->expects(self::once())
            ->method('getResponse')
            ->willReturn($response)
        ;

        $riotConnection = $this->createMock(ConnectionInterface::class);
        $riotConnection->expects(self::once())
            ->method('get')
            ->with(self::equalTo('eun1'), self::equalTo($path))
            ->willReturn($riotResponse)
        ;

        return $riotConnection;
    }

    /**
     * @param array<mixed> $apiResponse
     */
    protected function createObjectConnectionMock(string $path, array $apiResponse): ConnectionInterface
    {
        $response = $this->createMock(ResponseDecoderInterface::class);
        $response->expects(self::once())
            ->method('getBodyContentsDecodedAsArray')
            ->willReturn($apiResponse)
        ;

        $riotConnection = $this->createMock(ConnectionInterface::class);
        $riotConnection->expects(self::once())
            ->method('get')
            ->with(self::equalTo('eun1'), self::equalTo($path))
            ->willReturn($response)
        ;

        return $riotConnection;
    }
}
