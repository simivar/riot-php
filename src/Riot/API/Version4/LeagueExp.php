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
use Riot\Enum\TierExpEnum;

final class LeagueExp extends AbstractApi
{
    public function getByQueueAndTierAndDivision(
        QueueEnum $queue,
        TierExpEnum $tier,
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
}
