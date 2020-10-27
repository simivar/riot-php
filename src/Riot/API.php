<?php

declare(strict_types=1);

namespace Riot;

use Riot\API\Version1;
use Riot\API\Version3;
use Riot\API\Version4;

final class API
{
    private ConnectionInterface $riotConnection;

    /** @var array<string, mixed> */
    private array $apis;

    public function __construct(ConnectionInterface $riotConnection)
    {
        $this->riotConnection = $riotConnection;
    }

    public function getSummonerV4Api(): Version4\Summoner
    {
        if (!isset($this->apis['summonerV4'])) {
            $this->apis['summonerV4'] = new Version4\Summoner($this->riotConnection);
        }

        return $this->apis['summonerV4'];
    }

    public function getThirdPartyCodeV4Api(): Version4\ThirdPartyCode
    {
        if (!isset($this->apis['thirdPartyCodeV4'])) {
            $this->apis['thirdPartyCodeV4'] = new Version4\ThirdPartyCode($this->riotConnection);
        }

        return $this->apis['thirdPartyCodeV4'];
    }

    public function getAccountV1Api(): Version1\Account
    {
        if (!isset($this->apis['accountV1'])) {
            $this->apis['accountV1'] = new Version1\Account($this->riotConnection);
        }

        return $this->apis['accountV1'];
    }

    public function getChampionMasteryV4Api(): Version4\ChampionMastery
    {
        if (!isset($this->apis['championMasteryV4'])) {
            $this->apis['championMasteryV4'] = new Version4\ChampionMastery($this->riotConnection);
        }

        return $this->apis['championMasteryV4'];
    }

    public function getChampionV3Api(): Version3\Champion
    {
        if (!isset($this->apis['championV3'])) {
            $this->apis['championV3'] = new Version3\Champion($this->riotConnection);
        }

        return $this->apis['championV3'];
    }

    public function getLolStatusV3Api(): Version3\LolStatus
    {
        if (!isset($this->apis['lolStatusV3'])) {
            $this->apis['lolStatusV3'] = new Version3\LolStatus($this->riotConnection);
        }

        return $this->apis['lolStatusV3'];
    }

    public function getLorRankedV1Api(): Version1\LorRanked
    {
        if (!isset($this->apis['lorRankedV1'])) {
            $this->apis['lorRankedV1'] = new Version1\LorRanked($this->riotConnection);
        }

        return $this->apis['lorRankedV1'];
    }

    public function getSpectatorV4Api(): Version4\Spectator
    {
        if (!isset($this->apis['spectatorV4'])) {
            $this->apis['spectatorV4'] = new Version4\Spectator($this->riotConnection);
        }

        return $this->apis['spectatorV4'];
    }

    public function getLorMatchV1Api(): Version1\LorMatch
    {
        if (!isset($this->apis['lorMatchV1'])) {
            $this->apis['lorMatchV1'] = new Version1\LorMatch($this->riotConnection);
        }

        return $this->apis['lorMatchV1'];
    }

    public function getLeagueV4Api(): Version4\League
    {
        if (!isset($this->apis['leagueV4'])) {
            $this->apis['leagueV4'] = new Version4\League($this->riotConnection);
        }

        return $this->apis['leagueV4'];
    }

    public function getMatchV4(): Version4\Matches
    {
        if (!isset($this->apis['matchV4'])) {
            $this->apis['matchV4'] = new Version4\Matches($this->riotConnection);
        }

        return $this->apis['matchV4'];
    }

    public function getClasV1(): Version1\Clash
    {
        if (!isset($this->apis['clashV1'])) {
            $this->apis['clashV1'] = new Version1\Clash($this->riotConnection);
        }

        return $this->apis['clashV1'];
    }

    public function getTournamentStubV4(): Version4\TournamentStub
    {
        if (!isset($this->apis['tournamentStubV4'])) {
            $this->apis['tournamentStubV4'] = new Version4\TournamentStub($this->riotConnection);
        }

        return $this->apis['tournamentStubV4'];
    }

    public function getTournamentV4(): Version4\Tournament
    {
        if (!isset($this->apis['tournamentV4'])) {
            $this->apis['tournamentV4'] = new Version4\Tournament($this->riotConnection);
        }

        return $this->apis['tournamentV4'];
    }
}
