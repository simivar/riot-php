<?php

declare(strict_types=1);

namespace Riot\Tests;

use PHPUnit\Framework\TestCase;
use Riot\API\ResponseDecoderInterface;
use Riot\ConnectionInterface;

class APITestCase extends TestCase
{
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

    protected function createStringConnectionMock(string $path, string $apiResponse): ConnectionInterface
    {
        $response = $this->createMock(ResponseDecoderInterface::class);
        $response->expects(self::once())
            ->method('getBodyContentsDecodedAsString')
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

    protected function createIntConnectionMock(string $path, int $apiResponse): ConnectionInterface
    {
        $response = $this->createMock(ResponseDecoderInterface::class);
        $response->expects(self::once())
            ->method('getBodyContentsDecodedAsInt')
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
