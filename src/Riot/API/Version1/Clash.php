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
        return PlayerDTOCollection::createFromArray(
            $this->get($region, sprintf('lol/clash/v1/players/by-summoner/%s', $encryptedSummonerId))
        );
    }

    public function getTeamById(string $teamid, RegionEnum $region): TeamDTO
    {
        return TeamDTO::createFromArray(
            $this->get($region, sprintf('lol/clash/v1/teams/%s', $teamid))
        );
    }

    public function getTournaments(RegionEnum $region): TournamentDTOCollection
    {
        return TournamentDTOCollection::createFromArray(
            $this->get($region,'lol/clash/v1/tournaments')
        );
    }

    public function getTournamentByTeamId(string $teamId, RegionEnum $region): TournamentDTO
    {
        return TournamentDTO::createFromArray(
            $this->get($region, sprintf('lol/clash/v1/tournaments/by-team/%s', $teamId))
        );
    }

    public function getTournamentById(string $tournamentId, RegionEnum $region): TournamentDTO
    {
        return TournamentDTO::createFromArray(
            $this->get($region, sprintf('lol/clash/v1/tournaments/%s', $tournamentId))
        );
    }
}
