<?php

declare(strict_types=1);

namespace Riot\Tests\Unit;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use Riot\Connection;
use Riot\Exception as RiotException;

final class ConnectionTest extends TestCase
{
    /** @var MockObject&RequestFactoryInterface */
    private $requestFactory;

    /** @var MockObject&ResponseInterface */
    private $response;

    public function setUp(): void
    {
        $request = $this->createMock(RequestInterface::class);
        $request->expects(self::once())
            ->method('withAddedHeader')
            ->with(self::equalTo('X-Riot-Token'), self::equalTo('my-api-token'))
            ->willReturnSelf()
        ;

        $this->requestFactory = $this->createMock(RequestFactoryInterface::class);
        $this->requestFactory->expects(self::once())
            ->method('createRequest')
            ->with(self::equalTo('GET'), self::equalTo('https://region.api.riotgames.com/path'))
            ->willReturn($request)
        ;

        $this->response = $this->createMock(ResponseInterface::class);
    }

    public function testGetBuildsRequestWithApiTokenHeader(): void
    {
        $connection = new Connection(
            $this->createMock(ClientInterface::class),
            'my-api-token',
            $this->requestFactory, // @phpstan-ignore-line
        );

        $connection->get('region', 'path');
    }

    /**
     * @dataProvider statusCodesAndExceptionsProvider
     * @psalm-param class-string<\Throwable> $expectedException
     */
    public function testThrowsProperExceptionOnError(int $statusCode, string $expectedException): void
    {
        $this->expectException($expectedException);

        $this->response->expects(self::exactly(2))
            ->method('getStatusCode')
            ->willReturn($statusCode)
        ;
        $this->response
            ->method('getHeader')
            ->willReturn(['1'])
        ;

        $client = $this->createMock(ClientInterface::class);
        $client->expects(self::once())
            ->method('sendRequest')
            ->willReturn($this->response)
        ;

        $connection = new Connection(
            $client,
            'my-api-token',
            $this->requestFactory, // @phpstan-ignore-line
        );
        $connection->get('region', 'path');
    }

    public function testReturnsResponsesWhenNoError(): void
    {
        $this->response->expects(self::once())
            ->method('getStatusCode')
            ->willReturn(200)
        ;

        $client = $this->createMock(ClientInterface::class);
        $client->expects(self::once())
            ->method('sendRequest')
            ->willReturn($this->response)
        ;

        $connection = new Connection(
            $client,
            'my-api-token',
            $this->requestFactory,
        );
        $result = $connection->get('region', 'path');

        self::assertInstanceOf(ResponseInterface::class, $result);
    }

    public function testGetObjectReturnsDecodedJson(): void
    {
        $this->response->expects(self::once())
            ->method('getStatusCode')
            ->willReturn(200)
        ;

        $stream = $this->createMock(StreamInterface::class);
        $stream->expects(self::once())
            ->method('getContents')
            ->willReturn('{"id":1}')
        ;

        $this->response->expects(self::once())
            ->method('getBody')
            ->willReturn($stream)
        ;

        $client = $this->createMock(ClientInterface::class);
        $client->expects(self::once())
            ->method('sendRequest')
            ->willReturn($this->response)
        ;

        $connection = new Connection(
            $client,
            'my-api-token',
            $this->requestFactory,
        );
        $result = $connection->getAsDecodedArray('region', 'path');

        self::assertIsArray($result);
        self::assertSame(['id' => 1], $result);
    }

    /**
     * @return array<array<int, class-string|int>>
     */
    public function statusCodesAndExceptionsProvider(): array
    {
        return [
            [400, RiotException\BadRequestException::class],
            [401, RiotException\UnauthorizedException::class],
            [403, RiotException\ForbiddenException::class],
            [404, RiotException\DataNotFoundException::class],
            [405, RiotException\MethodNotAllowedException::class],
            [415, RiotException\UnsupportedMediaTypeException::class],
            [429, RiotException\RateLimitExceededException::class],
            [500, RiotException\InternalServerErrorException::class],
            [502, RiotException\BadGatewayException::class],
            [503, RiotException\ServiceUnavailableException::class],
            [504, RiotException\GatewayTimeoutException::class],
        ];
    }
}
