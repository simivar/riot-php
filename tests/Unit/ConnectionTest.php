<?php

declare(strict_types=1);

namespace Riot\Tests\Unit;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Riot\API\ResponseDecoderInterface;
use Riot\Connection;
use Riot\Exception as RiotException;

final class ConnectionTest extends TestCase
{
    /** @var MockObject&RequestInterface */
    private $request;

    /** @var MockObject&RequestFactoryInterface */
    private $requestFactory;

    /** @var MockObject&ResponseInterface */
    private $response;

    /** @var MockObject&StreamFactoryInterface */
    private $streamFactory;

    public function setUp(): void
    {
        $this->request = $this->createMock(RequestInterface::class);
        $this->request->expects(self::once())
            ->method('withAddedHeader')
            ->with(self::equalTo('X-Riot-Token'), self::equalTo('my-api-token'))
            ->willReturnSelf()
        ;

        $this->requestFactory = $this->createMock(RequestFactoryInterface::class);
        $this->response = $this->createMock(ResponseInterface::class);
        $this->streamFactory = $this->createMock(StreamFactoryInterface::class);
    }

    public function testGetBuildsRequestWithApiTokenHeader(): void
    {
        $this->mockCreateRequestMethod('GET');

        $connection = new Connection(
            $this->createMock(ClientInterface::class),
            'my-api-token',
            $this->requestFactory,
            $this->streamFactory,
        );

        $connection->get('region', 'path');
    }

    /**
     * @dataProvider requestWithDataMethodsProvider
     */
    public function testMethodsWithDataBuildsRequestWithApiTokenHeader(string $method): void
    {
        $this->mockCreateRequestMethod($method);
        $this->request->expects(self::once())
            ->method('withBody')
            ->willReturnSelf()
        ;

        $connection = new Connection(
            $this->createMock(ClientInterface::class),
            'my-api-token',
            $this->requestFactory,
            $this->streamFactory,
        );

        $connection->$method('region', 'path', []);
    }

    /**
     * @dataProvider statusCodesAndExceptionsProvider
     * @psalm-param class-string<\Throwable> $expectedException
     */
    public function testGetThrowsProperExceptionOnError(int $statusCode, string $expectedException): void
    {
        $this->testExceptionForMethod('GET', $statusCode, $expectedException);
    }

    /**
     * @dataProvider statusCodesAndExceptionsProvider
     * @psalm-param class-string<\Throwable> $expectedException
     */
    public function testPostThrowsProperExceptionOnError(int $statusCode, string $expectedException): void
    {
        $this->testExceptionForMethod('POST', $statusCode, $expectedException);
    }

    /**
     * @dataProvider statusCodesAndExceptionsProvider
     * @psalm-param class-string<\Throwable> $expectedException
     */
    public function testPutThrowsProperExceptionOnError(int $statusCode, string $expectedException): void
    {
        $this->testExceptionForMethod('PUT', $statusCode, $expectedException);
    }

    /**
     * @param class-string<\Throwable> $expectedException
     */
    private function testExceptionForMethod(string $method, int $statusCode, string $expectedException): void
    {
        $this->mockCreateRequestMethod($method);

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
            $this->streamFactory,
        );
        switch ($method) {
            case 'GET':
                $connection->get('region', 'path');
                break;
            case 'PUT':
            case 'POST':
                $this->request->expects(self::once())
                    ->method('withBody')
                    ->willReturnSelf()
                ;
                $connection->$method('region', 'path', []);
                break;
        }
    }

    public function testGetReturnsResponsesWhenNoError(): void
    {
        $this->mockCreateRequestMethod('GET');

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
            $this->streamFactory,
        );
        $result = $connection->get('region', 'path');

        self::assertInstanceOf(ResponseDecoderInterface::class, $result);
    }

    /**
     * @dataProvider requestWithDataMethodsProvider
     */
    public function testMethodsWithDataReturnResponsesWhenNoError(string $method): void
    {
        $this->mockCreateRequestMethod($method);
        $this->request->expects(self::once())
            ->method('withBody')
            ->willReturnSelf()
        ;

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
            $this->streamFactory,
        );
        $result = $connection->$method('region', 'path', []);

        self::assertInstanceOf(ResponseDecoderInterface::class, $result);
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

    /**
     * @return array<array<string>>
     */
    public function requestWithDataMethodsProvider(): array
    {
        return [
            ['POST'],
            ['PUT'],
        ];
    }

    private function mockCreateRequestMethod(string $method): void
    {
        $this->requestFactory->expects(self::once())
            ->method('createRequest')
            ->with(self::equalTo($method), self::equalTo('https://region.api.riotgames.com/path'))
            ->willReturn($this->request)
        ;
    }
}
