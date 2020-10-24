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
        $response = $this->riotConnection->get(
            $region->__toString(),
            sprintf('lol/league/v4/challengerleagues/by-queue/%s', $queue->__toString()),
        );

        return LeagueListDTO::createFromArray($response->getBodyContentsDecodedAsArray());
    }

    public function getBySummonerId(string $encryptedSummonerId, RegionEnum $region): LeagueEntryDTOCollection
    {
        $response = $this->riotConnection->get(
            $region->__toString(),
            sprintf('lol/league/v4/entries/by-summoner/%s', $encryptedSummonerId),
        );

        return LeagueEntryDTOCollection::createFromArray($response->getBodyContentsDecodedAsArray());
    }

    public function getByQueueAndTierAndDivision(
        QueueEnum $queue,
        TierEnum $tier,
        DivisionEnum $division,
        RegionEnum $region,
        int $page = 1
    ): LeagueEntryDTOCollection {
        $response = $this->riotConnection->get(
            $region->__toString(),
            sprintf(
                'lol/league/v4/entries/%s/%s/%s?page=%d',
                $queue->__toString(),
                $tier->__toString(),
                $division->__toString(),
                $page
            ),
        );

        return LeagueEntryDTOCollection::createFromArray($response->getBodyContentsDecodedAsArray());
    }

    public function getGrandmasterLeaguesByQueue(QueueEnum $queue, RegionEnum $region): LeagueListDTO
    {
        $response = $this->riotConnection->get(
            $region->__toString(),
            sprintf('lol/league/v4/grandmasterleagues/by-queue/%s', $queue->__toString()),
        );

        return LeagueListDTO::createFromArray($response->getBodyContentsDecodedAsArray());
    }

    public function getById(string $leagueId, RegionEnum $region): LeagueListDTO
    {
        $response = $this->riotConnection->get(
            $region->__toString(),
            sprintf('lol/league/v4/leagues/%s', $leagueId),
        );

        return LeagueListDTO::createFromArray($response->getBodyContentsDecodedAsArray());
    }

    public function getMasterLeaguesByQueue(QueueEnum $queue, RegionEnum $region): LeagueListDTO
    {
        $response = $this->riotConnection->get(
            $region->__toString(),
            sprintf('lol/league/v4/masterleagues/by-queue/%s', $queue->__toString()),
        );

        return LeagueListDTO::createFromArray($response->getBodyContentsDecodedAsArray());
    }
}
