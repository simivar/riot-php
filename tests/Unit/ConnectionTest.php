<?php

declare(strict_types=1);

namespace Riot\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Riot\Connection;
use Riot\Exception as RiotException;

final class ConnectionTest extends TestCase
{
    private RequestFactoryInterface $requestFactory;

    private ResponseInterface $response;

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
            $this->requestFactory,
        );

        $connection->get('region', 'path');
    }

    /**
     * @dataProvider statusCodesAndExceptionsProvider
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
            $this->requestFactory,
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

    public function statusCodesAndExceptionsProvider(): array
    {
        return [
            [400, RiotException\BadRequestException::class,],
            [401, RiotException\UnauthorizedException::class,],
            [403, RiotException\ForbiddenException::class,],
            [404, RiotException\DataNotFoundException::class,],
            [405, RiotException\MethodNotAllowedException::class,],
            [415, RiotException\UnsupportedMediaTypeException::class,],
            [429, RiotException\RateLimitExceededException::class,],
            [500, RiotException\InternalServerErrorException::class,],
            [502, RiotException\BadGatewayException::class,],
            [503, RiotException\ServiceUnavailableException::class,],
            [504, RiotException\GatewayTimeoutException::class,],
        ];
    }
}
