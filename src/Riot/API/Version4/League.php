<?php

declare(strict_types=1);

namespace Riot\API\Version4;

use Riot\API\AbstractApi;
use Riot\DTO\LeagueListDTO;
use Riot\Enum\QueueEnum;
use Riot\Enum\RegionEnum;

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
}
