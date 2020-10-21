<?php
declare(strict_types=1);

namespace Riot\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Riot\Connection;
use Riot\Exception\RateLimitExceededException;

final class ConnectionTest extends TestCase
{
    public function testGetBuildsRequestWithApiTokenHeader(): void
    {
        $request = $this->createMock(RequestInterface::class);
        $request->expects(self::once())
            ->method('withAddedHeader')
            ->with(self::equalTo('X-Riot-Token'), self::equalTo('my-api-token'))
            ->willReturnSelf();

        $requestFactory = $this->createMock(RequestFactoryInterface::class);
        $requestFactory->expects(self::once())
            ->method('createRequest')
            ->with(self::equalTo('GET'), self::equalTo('https://region.api.riotgames.com/path'))
            ->willReturn($request);

        $connection = new Connection(
            $this->createMock(ClientInterface::class),
            'my-api-token',
            $requestFactory,
        );

        $connection->get('region', 'path');
    }

    public function testThrowsExceptionOnRateLimitExceeded(): void
    {
        $this->expectException(RateLimitExceededException::class);

        $request = $this->createMock(RequestInterface::class);
        $request->expects(self::once())
            ->method('withAddedHeader')
            ->willReturnSelf();
        $requestFactory = $this->createMock(RequestFactoryInterface::class);
        $requestFactory->expects(self::once())
            ->method('createRequest')
            ->willReturn($request);

        $response = $this->createMock(ResponseInterface::class);
        $response->expects(self::once())
            ->method('getStatusCode')
            ->willReturn(429);
        $response
            ->method('getHeader')
            ->willReturn(['1']);

        $client = $this->createMock(ClientInterface::class);
        $client->expects(self::once())
            ->method('sendRequest')
            ->willReturn($response);

        $connection = new Connection(
            $client,
            'my-api-token',
            $requestFactory,
        );
        $connection->get('region', 'path');
    }

    public function testReturnsNullOnNonRateLimitExceededError(): void
    {
        $request = $this->createMock(RequestInterface::class);
        $request->expects(self::once())
            ->method('withAddedHeader')
            ->willReturnSelf();
        $requestFactory = $this->createMock(RequestFactoryInterface::class);
        $requestFactory->expects(self::once())
            ->method('createRequest')
            ->willReturn($request);

        $response = $this->createMock(ResponseInterface::class);
        $response->expects(self::exactly(2))
            ->method('getStatusCode')
            ->willReturn(500);
        $response
            ->method('getHeader')
            ->willReturn('1');

        $client = $this->createMock(ClientInterface::class);
        $client->expects(self::once())
            ->method('sendRequest')
            ->willReturn($response);

        $connection = new Connection(
            $client,
            'my-api-token',
            $requestFactory,
        );
        $result = $connection->get('region', 'path');

        self::assertNull($result);
    }

    public function testReturnsResponsesWhenNoError(): void
    {
        $request = $this->createMock(RequestInterface::class);
        $request->expects(self::once())
            ->method('withAddedHeader')
            ->willReturnSelf();
        $requestFactory = $this->createMock(RequestFactoryInterface::class);
        $requestFactory->expects(self::once())
            ->method('createRequest')
            ->willReturn($request);

        $response = $this->createMock(ResponseInterface::class);
        $response->expects(self::exactly(2))
            ->method('getStatusCode')
            ->willReturn(200);
        $response
            ->method('getHeader')
            ->willReturn('1');

        $client = $this->createMock(ClientInterface::class);
        $client->expects(self::once())
            ->method('sendRequest')
            ->willReturn($response);

        $connection = new Connection(
            $client,
            'my-api-token',
            $requestFactory,
        );
        $result = $connection->get('region', 'path');

        self::assertInstanceOf(ResponseInterface::class, $result);
    }
}
