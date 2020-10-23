<?php

declare(strict_types=1);

namespace Unit\API;

use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use Riot\API\ResponseDecoder;
use TypeError;

final class ResponseDecoderTest extends TestCase
{
    public function testGetBodyContentsDecodedAsArrayProperlyDecodesData(): void
    {
        $stream = $this->createMock(StreamInterface::class);
        $stream->expects(self::once())
            ->method('getContents')
            ->willReturn('{"id":1}')
        ;

        $response = $this->createMock(ResponseInterface::class);
        $response->expects(self::once())
            ->method('getBody')
            ->willReturn($stream)
        ;

        $decoder = new ResponseDecoder($response);
        $decodedAsArray = $decoder->getBodyContentsDecodedAsArray();
        self::assertIsArray($decodedAsArray);
        self::assertSame(['id' => 1], $decodedAsArray);
    }

    /**
     * @dataProvider provideNonArrayValues
     */
    public function testGetBodyContentsDecodedAsArrayThrowsExceptionOnNonArray($value): void
    {
        $this->expectException(TypeError::class);

        $stream = $this->createMock(StreamInterface::class);
        $stream->expects(self::once())
            ->method('getContents')
            ->willReturn($value)
        ;

        $response = $this->createMock(ResponseInterface::class);
        $response->expects(self::once())
            ->method('getBody')
            ->willReturn($stream)
        ;

        $decoder = new ResponseDecoder($response);
        $decoder->getBodyContentsDecodedAsArray();
    }

    public function testGetBodyContentsDecodedAsIntProperlyDecodesData(): void
    {
        $stream = $this->createMock(StreamInterface::class);
        $stream->expects(self::once())
            ->method('getContents')
            ->willReturn('123')
        ;

        $response = $this->createMock(ResponseInterface::class);
        $response->expects(self::once())
            ->method('getBody')
            ->willReturn($stream)
        ;

        $decoder = new ResponseDecoder($response);
        $decodedAsArray = $decoder->getBodyContentsDecodedAsInt();
        self::assertSame(123, $decodedAsArray);
    }

    /**
     * @dataProvider provideNonIntValues
     */
    public function testGetBodyContentsDecodedAsIntThrowsExceptionOnNonInt($value): void
    {
        $this->expectException(TypeError::class);

        $stream = $this->createMock(StreamInterface::class);
        $stream->expects(self::once())
            ->method('getContents')
            ->willReturn($value)
        ;

        $response = $this->createMock(ResponseInterface::class);
        $response->expects(self::once())
            ->method('getBody')
            ->willReturn($stream)
        ;

        $decoder = new ResponseDecoder($response);
        $decoder->getBodyContentsDecodedAsInt();
    }

    public function testGetBodyContentsDecodedAsStringProperlyDecodesData(): void
    {
        $stream = $this->createMock(StreamInterface::class);
        $stream->expects(self::once())
            ->method('getContents')
            ->willReturn('"test"')
        ;

        $response = $this->createMock(ResponseInterface::class);
        $response->expects(self::once())
            ->method('getBody')
            ->willReturn($stream)
        ;

        $decoder = new ResponseDecoder($response);
        $decodedAsArray = $decoder->getBodyContentsDecodedAsString();
        self::assertSame('test', $decodedAsArray);
    }

    /**
     * @dataProvider provideNonStringValues
     */
    public function testGetBodyContentsDecodedAsStringThrowsErrorOnNonString($value): void
    {
        $this->expectException(TypeError::class);

        $stream = $this->createMock(StreamInterface::class);
        $stream->expects(self::once())
            ->method('getContents')
            ->willReturn($value)
        ;

        $response = $this->createMock(ResponseInterface::class);
        $response->expects(self::once())
            ->method('getBody')
            ->willReturn($stream)
        ;

        $decoder = new ResponseDecoder($response);
        $decoder->getBodyContentsDecodedAsString();
    }

    public function provideNonStringValues(): array
    {
        return [
            ['123'],
            ['{"id":1}'],
            ['123.2'],
            ['false'],
        ];
    }

    public function provideNonIntValues(): array
    {
        return [
            ['"test"'],
            ['{"id":1}'],
            ['123.2'],
            ['false'],
        ];
    }

    public function provideNonArrayValues(): array
    {
        return [
            ['123'],
            ['"test"'],
            ['123.2'],
            ['false'],
        ];
    }
}
