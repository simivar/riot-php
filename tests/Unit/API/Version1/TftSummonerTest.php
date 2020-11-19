<?php

declare(strict_types=1);

namespace Tests\Riot\Unit\API\Version1;

use Riot\API\Version1\TftSummoner;
use Riot\DTO\SummonerDTO;
use Riot\Enum\RegionEnum;
use Riot\Tests\APITestCase;

final class TftSummonerTest extends APITestCase
{
    public function testGetByNameReturnsSummonerDTOOnSuccess(): void
    {
        $summoner = new TftSummoner($this->createObjectConnectionMock(
            'tft/summoner/v1/summoners/by-account/simivar',
            [
                'accountId' => '1',
                'profileIconId' => 2,
                'revisionDate' => 3,
                'name' => '4',
                'id' => '5',
                'puuid' => '6',
                'summonerLevel' => 7,
            ],
            'eun1',
        ));
        $result = $summoner->getByName('simivar', RegionEnum::EUN1());
        self::assertInstanceOf(SummonerDTO::class, $result);
    }

    public function testGetByAccountIdReturnsSummonerDTOOnSuccess(): void
    {
        $summoner = new TftSummoner($this->createObjectConnectionMock(
            'ft/summoner/v1/summoners/by-name/simivar',
            [
                'accountId' => '1',
                'profileIconId' => 2,
                'revisionDate' => 3,
                'name' => '4',
                'id' => '5',
                'puuid' => '6',
                'summonerLevel' => 7,
            ],
            'eun1',
        ));
        $result = $summoner->getByAccountId('simivar', RegionEnum::EUN1());
        self::assertInstanceOf(SummonerDTO::class, $result);
    }

    public function testGetByPuuidReturnsSummonerDTOOnSuccess(): void
    {
        $summoner = new TftSummoner($this->createObjectConnectionMock(
            'tft/summoner/v1/summoners/by-puuid/simivar',
            [
                'accountId' => '1',
                'profileIconId' => 2,
                'revisionDate' => 3,
                'name' => '4',
                'id' => '5',
                'puuid' => '6',
                'summonerLevel' => 7,
            ],
            'eun1',
        ));
        $result = $summoner->getByPuuid('simivar', RegionEnum::EUN1());
        self::assertInstanceOf(SummonerDTO::class, $result);
    }

    public function testGetByIdReturnsSummonerDTOOnSuccess(): void
    {
        $summoner = new TftSummoner($this->createObjectConnectionMock(
            'tft/summoner/v1/summoners/simivar',
            [
                'accountId' => '1',
                'profileIconId' => 2,
                'revisionDate' => 3,
                'name' => '4',
                'id' => '5',
                'puuid' => '6',
                'summonerLevel' => 7,
            ],
            'eun1',
        ));
        $result = $summoner->getById('simivar', RegionEnum::EUN1());
        self::assertInstanceOf(SummonerDTO::class, $result);
    }
}
