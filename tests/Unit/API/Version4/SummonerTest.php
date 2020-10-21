<?php

declare(strict_types=1);

namespace Riot\Tests\Unit\API\Version4;

use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use Riot\API\Version4\Summoner;
use Riot\ConnectionInterface;
use Riot\DTO\SummonerDTO;

final class SummonerTest extends TestCase
{
    private function setUpNullResponse(string $path): ConnectionInterface
    {
        $nullRiotConnectionResponse = $this->createMock(ConnectionInterface::class);
        $nullRiotConnectionResponse->expects(self::once())
            ->method('get')
            ->with(self::equalTo('eun1'), self::equalTo($path))
            ->willReturn(null)
        ;

        return $nullRiotConnectionResponse;
    }

    private function setUpJsonResponse(string $path): ConnectionInterface
    {
        $apiResponse = '{"id": "1","accountId": "2","puuid": "3","name": "Simivar","profileIconId": 4,"revisionDate": 5,"summonerLevel": 6}';

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
            ->with(self::equalTo('eun1'), self::equalTo($path))
            ->willReturn($response)
        ;

        return $riotConnection;
    }

    public function testGetByNameReturnsNullOnGetNull(): void
    {
        $summoner = new Summoner($this->setUpNullResponse('lol/summoner/v4/summoners/by-name/simivar'));
        $result = $summoner->getByName('simivar', 'eun1');
        self::assertNull($result);
    }

    public function testGetByNameReturnsSummonerDTOOnSuccess(): void
    {
        $summoner = new Summoner($this->setUpJsonResponse('lol/summoner/v4/summoners/by-name/simivar'));
        $result = $summoner->getByName('simivar', 'eun1');
        self::assertInstanceOf(SummonerDTO::class, $result);
    }

    public function testGetByAccountIdReturnsNullOnGetNull(): void
    {
        $summoner = new Summoner($this->setUpNullResponse('lol/summoner/v4/summoners/by-account/simivar'));
        $result = $summoner->getByAccountId('simivar', 'eun1');
        self::assertNull($result);
    }

    public function testGetByAccountIdReturnsSummonerDTOOnSuccess(): void
    {
        $summoner = new Summoner($this->setUpJsonResponse('lol/summoner/v4/summoners/by-account/simivar'));
        $result = $summoner->getByAccountId('simivar', 'eun1');
        self::assertInstanceOf(SummonerDTO::class, $result);
    }

    public function testGetByPuuidReturnsNullOnGetNull(): void
    {
        $summoner = new Summoner($this->setUpNullResponse('lol/summoner/v4/summoners/by-puuid/simivar'));
        $result = $summoner->getByPuuid('simivar', 'eun1');
        self::assertNull($result);
    }

    public function testGetByPuuidReturnsSummonerDTOOnSuccess(): void
    {
        $summoner = new Summoner($this->setUpJsonResponse('lol/summoner/v4/summoners/by-puuid/simivar'));
        $result = $summoner->getByPuuid('simivar', 'eun1');
        self::assertInstanceOf(SummonerDTO::class, $result);
    }

    public function testGetByIdReturnsNullOnGetNull(): void
    {
        $summoner = new Summoner($this->setUpNullResponse('lol/summoner/v4/summoners/simivar'));
        $result = $summoner->getById('simivar', 'eun1');
        self::assertNull($result);
    }

    public function testGetByIdReturnsSummonerDTOOnSuccess(): void
    {
        $summoner = new Summoner($this->setUpJsonResponse('lol/summoner/v4/summoners/simivar'));
        $result = $summoner->getById('simivar', 'eun1');
        self::assertInstanceOf(SummonerDTO::class, $result);
    }
}
