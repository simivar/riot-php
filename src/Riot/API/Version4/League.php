<?php

declare(strict_types=1);

namespace Riot\API\Version4;

use Riot\API\AbstractApi;
use Riot\Collection\LeagueEntryDTOCollection;
use Riot\DTO\LeagueListDTO;
use Riot\Enum\DivisionEnum;
use Riot\Enum\QueueEnum;
use Riot\Enum\RegionEnum;
use Riot\Enum\TierEnum;

final class League extends AbstractApi
{
    public function getChallengerLeaguesByQueue(QueueEnum $queue, RegionEnum $region): LeagueListDTO
    {
        return LeagueListDTO::createFromArray(
            $this->get($region, sprintf('lol/league/v4/challengerleagues/by-queue/%s', $queue))
        );
    }

    public function getBySummonerId(string $encryptedSummonerId, RegionEnum $region): LeagueEntryDTOCollection
    {
        return LeagueEntryDTOCollection::createFromArray(
            $this->get($region, sprintf('lol/league/v4/entries/by-summoner/%s', $encryptedSummonerId))
        );
    }

    public function getByQueueAndTierAndDivision(
        QueueEnum $queue,
        TierEnum $tier,
        DivisionEnum $division,
        RegionEnum $region,
        int $page = 1
    ): LeagueEntryDTOCollection {
        return LeagueEntryDTOCollection::createFromArray(
            $this->get($region, sprintf('lol/league/v4/entries/%s/%s/%s?page=%d', $queue, $tier, $division, $page))
        );
    }

    public function getGrandmasterLeaguesByQueue(QueueEnum $queue, RegionEnum $region): LeagueListDTO
    {
        return LeagueListDTO::createFromArray(
            $this->get($region, sprintf('lol/league/v4/grandmasterleagues/by-queue/%s', $queue))
        );
    }

    public function getById(string $leagueId, RegionEnum $region): LeagueListDTO
    {
        return LeagueListDTO::createFromArray(
            $this->get($region, sprintf('lol/league/v4/leagues/%s', $leagueId))
        );
    }

    public function getMasterLeaguesByQueue(QueueEnum $queue, RegionEnum $region): LeagueListDTO
    {
        return LeagueListDTO::createFromArray(
            $this->get($region, sprintf('lol/league/v4/masterleagues/by-queue/%s', $queue))
        );
    }
}
