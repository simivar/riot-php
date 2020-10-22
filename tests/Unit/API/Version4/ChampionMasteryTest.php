<?php

declare(strict_types=1);

namespace Tests\Riot\Unit\API\Version4;

use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use Riot\API\Version4\ChampionMastery;
use Riot\Collection\ChampionMasteryDTOCollection;
use Riot\ConnectionInterface;
use Riot\DTO\ChampionMasteryDTO;

final class ChampionMasteryTest extends TestCase
{
    private function setUpJsonResponse(string $path, string $apiResponse): ConnectionInterface
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

        $riotConnection = $this->createMock(ConnectionInterface::class);
        $riotConnection->expects(self::once())
            ->method('get')
            ->with(self::equalTo('eun1'), self::equalTo($path))
            ->willReturn($response)
        ;

        return $riotConnection;
    }

    public function testGetBySummonerIdReturnsEmptyCollectionOnEmptyArray(): void
    {
        $summoner = new ChampionMastery($this->setUpJsonResponse(
            '/lol/champion-mastery/v4/champion-masteries/by-summoner/1',
            '[]'),
        );
        $result = $summoner->getBySummonerId('1', 'eun1');
        self::assertInstanceOf(ChampionMasteryDTOCollection::class, $result);
        self::assertTrue($result->isEmpty());
    }

    public function testGetBySummonerIdReturnsCollectionOnSuccess(): void
    {
        $summoner = new ChampionMastery($this->setUpJsonResponse(
            '/lol/champion-mastery/v4/champion-masteries/by-summoner/1',
            '[{
                "championId": 51,
                "championLevel": 6,
                "championPoints": 32750,
                "lastPlayTime": 1603376987000,
                "championPointsSinceLastLevel": 11150,
                "championPointsUntilNextLevel": 0,
                "chestGranted": true,
                "tokensEarned": 0,
                "summonerId": "some_id"
            }]'),
        );
        $result = $summoner->getBySummonerId('1', 'eun1');
        self::assertInstanceOf(ChampionMasteryDTOCollection::class, $result);
        self::assertFalse($result->isEmpty());
        self::assertInstanceOf(ChampionMasteryDTO::class, $result->offsetGet(0));
    }

    public function testGetBySummonerIdAndChampionIdReturnsAccountDTOOnSuccess(): void
    {
        $summoner = new ChampionMastery($this->setUpJsonResponse(
            '/lol/champion-mastery/v4/champion-masteries/by-summoner/1/by-champion/2',
            '{
                "championId": 51,
                "championLevel": 6,
                "championPoints": 32750,
                "lastPlayTime": 1603376987000,
                "championPointsSinceLastLevel": 11150,
                "championPointsUntilNextLevel": 0,
                "chestGranted": true,
                "tokensEarned": 0,
                "summonerId": "some_id"
            }'
        ));
        $result = $summoner->getBySummonerIdAndChampionId('1', 2, 'eun1');
        self::assertInstanceOf(ChampionMasteryDTO::class, $result);
    }

    public function testGetScoreBySummonerIdReturnsActiveShardDTOOnSuccess(): void
    {
        $summoner = new ChampionMastery($this->setUpJsonResponse(
            '/lol/champion-mastery/v4/scores/by-summoner/1',
            '136'
        ));
        $result = $summoner->getScoreBySummonerId('1', 'eun1');
        self::assertSame(136, $result);
    }
}
