<?php
declare(strict_types=1);

namespace Riot\Tests\API\Version4;

use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use Riot\API\Version4\Summoner;
use Riot\ConnectionInterface;
use Riot\DTO\SummonerDTO;

final class SummonerTest extends TestCase
{
    public function testGetByNameReturnsNullOnGetNull(): void
    {
        $riotConnection = $this->createMock(ConnectionInterface::class);
        $riotConnection->expects(self::once())
            ->method('get')
            ->with(self::equalTo('eun1'), self::equalTo('lol/summoner/v4/summoners/by-name/simivar'))
            ->willReturn(null);

        $summoner = new Summoner($riotConnection);
        $result = $summoner->getByName('simivar', 'eun1');
        self::assertNull($result);
    }

    public function testGetByNameReturnsSummonerDTOOnSuccess(): void
    {
        $apiResponse = '{"id": "1","accountId": "2","puuid": "3","name": "Simivar","profileIconId": 4,"revisionDate": 5,"summonerLevel": 6}';

        $stream = $this->createMock(StreamInterface::class);
        $stream->expects(self::once())
            ->method('getContents')
            ->willReturn($apiResponse);

        $response = $this->createMock(ResponseInterface::class);
        $response->expects(self::once())
            ->method('getBody')
            ->willReturn($stream);

        $riotConnection = $this->createMock(ConnectionInterface::class);
        $riotConnection->expects(self::once())
            ->method('get')
            ->with(self::equalTo('eun1'), self::equalTo('lol/summoner/v4/summoners/by-name/simivar'))
            ->willReturn($response);

        $summoner = new Summoner($riotConnection);
        $result = $summoner->getByName('simivar', 'eun1');
        self::assertInstanceOf(SummonerDTO::class, $result);
    }


}
