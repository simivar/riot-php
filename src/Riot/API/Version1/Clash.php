<?php

declare(strict_types=1);

namespace Riot\API\Version1;

use Riot\API\AbstractApi;
use Riot\Collection\Clash\PlayerDTOCollection;
use Riot\Collection\Clash\TournamentDTOCollection;
use Riot\DTO\Clash\TeamDTO;
use Riot\DTO\Clash\TournamentDTO;
use Riot\Enum\RegionEnum;

final class Clash extends AbstractApi
{
    public function getPlayersBySummonerId(string $encryptedSummonerId, RegionEnum $region): PlayerDTOCollection
    {
        $response = $this->riotConnection->get(
            $region->getValue(),
            sprintf('lol/clash/v1/players/by-summoner/%s', $encryptedSummonerId),
        );

        return PlayerDTOCollection::createFromArray($response->getBodyContentsDecodedAsArray());
    }

    public function getTeamById(string $teamid, RegionEnum $region): TeamDTO
    {
        $response = $this->riotConnection->get(
            $region->getValue(),
            sprintf('lol/clash/v1/teams/%s', $teamid),
        );

        return TeamDTO::createFromArray($response->getBodyContentsDecodedAsArray());
    }

    public function getTournaments(RegionEnum $region): TournamentDTOCollection
    {
        $response = $this->riotConnection->get(
            $region->getValue(),
            'lol/clash/v1/tournaments',
        );

        return TournamentDTOCollection::createFromArray($response->getBodyContentsDecodedAsArray());
    }

    public function getTournamentByTeamId(string $teamId, RegionEnum $region): TournamentDTO
    {
        $response = $this->riotConnection->get(
            $region->getValue(),
            sprintf('lol/clash/v1/tournaments/by-team/%s', $teamId),
        );

        return TournamentDTO::createFromArray($response->getBodyContentsDecodedAsArray());
    }

    public function getTournamentById(string $tournamentId, RegionEnum $region): TournamentDTO
    {
        $response = $this->riotConnection->get(
            $region->getValue(),
            sprintf('lol/clash/v1/tournaments/%s', $tournamentId),
        );

        return TournamentDTO::createFromArray($response->getBodyContentsDecodedAsArray());
    }
}
