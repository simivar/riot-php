<?php

declare(strict_types=1);

namespace Riot\API\Version4;

use Riot\API\AbstractApi;
use Riot\Collection\LeagueEntryDTOCollection;
use Riot\Enum\DivisionEnum;
use Riot\Enum\QueueEnum;
use Riot\Enum\RegionEnum;
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
            $region->getValue(),
            sprintf(
                'lol/league/v4/entries/%s/%s/%s?page=%d',
                $queue->getValue(),
                $tier->getValue(),
                $division->getValue(),
                $page
            ),
        );

        return LeagueEntryDTOCollection::createFromArray($response->getBodyContentsDecodedAsArray());
    }
}
