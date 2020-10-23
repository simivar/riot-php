<?php

declare(strict_types=1);

namespace Unit\API;

use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use Riot\API\ResponseDecoder;

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
}
