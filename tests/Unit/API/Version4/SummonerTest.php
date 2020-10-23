<?php

declare(strict_types=1);

namespace Tests\Riot\Unit\API\Version4;

use Riot\API\Version4\Summoner;
use Riot\DTO\SummonerDTO;
use Riot\Tests\APITestCase;

final class SummonerTest extends APITestCase
{
    public function testGetByNameReturnsSummonerDTOOnSuccess(): void
    {
        $summoner = new Summoner($this->createConnectionMock(
            'lol/summoner/v4/summoners/by-name/simivar',
            '{"id": "1","accountId": "2","puuid": "3","name": "Simivar","profileIconId": 4,"revisionDate": 5,"summonerLevel": 6}',
        ));
        $result = $summoner->getByName('simivar', 'eun1');
        self::assertInstanceOf(SummonerDTO::class, $result);
    }

    public function testGetByAccountIdReturnsSummonerDTOOnSuccess(): void
    {
        $summoner = new Summoner($this->createConnectionMock(
            'lol/summoner/v4/summoners/by-account/simivar',
            '{"id": "1","accountId": "2","puuid": "3","name": "Simivar","profileIconId": 4,"revisionDate": 5,"summonerLevel": 6}',
        ));
        $result = $summoner->getByAccountId('simivar', 'eun1');
        self::assertInstanceOf(SummonerDTO::class, $result);
    }

    public function testGetByPuuidReturnsSummonerDTOOnSuccess(): void
    {
        $summoner = new Summoner($this->createConnectionMock(
            'lol/summoner/v4/summoners/by-puuid/simivar',
            '{"id": "1","accountId": "2","puuid": "3","name": "Simivar","profileIconId": 4,"revisionDate": 5,"summonerLevel": 6}',
        ));
        $result = $summoner->getByPuuid('simivar', 'eun1');
        self::assertInstanceOf(SummonerDTO::class, $result);
    }

    public function testGetByIdReturnsSummonerDTOOnSuccess(): void
    {
        $summoner = new Summoner($this->createConnectionMock(
            'lol/summoner/v4/summoners/simivar',
            '{"id": "1","accountId": "2","puuid": "3","name": "Simivar","profileIconId": 4,"revisionDate": 5,"summonerLevel": 6}',
        ));
        $result = $summoner->getById('simivar', 'eun1');
        self::assertInstanceOf(SummonerDTO::class, $result);
    }
}
