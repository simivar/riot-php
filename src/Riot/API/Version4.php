<?php

declare(strict_types=1);

namespace Riot\API;

use Riot\AbstractAPIFactory;
use Riot\API\Version4\ChampionMastery;
use Riot\API\Version4\League;
use Riot\API\Version4\LeagueExp;
use Riot\API\Version4\Match_;
use Riot\API\Version4\Spectator;
use Riot\API\Version4\Summoner;
use Riot\API\Version4\ThirdPartyCode;
use Riot\API\Version4\Tournament;
use Riot\API\Version4\TournamentStub;
use Riot\Exception\InvalidApiEndpointException;

final class Version4 extends AbstractAPIFactory
{
    private const SUMMONER = 'summoner';
    private const THIRD_PARTY_CODE = 'third_party_code';
    private const CHAMPION_MASTERY = 'champion_mastery';
    private const SPECTATOR = 'spectator';
    private const LEAGUE = 'league';
    private const MATCH_ = 'match';
    private const TOURNAMENT_STUB = 'tournament_stub';
    private const TOURNAMENT = 'tournament';
    private const LEAGUE_EXP = 'league_exp';

    public function getSummoner(): Summoner
    {
        /** @var Summoner $api */
        $api = $this->createApi(self::SUMMONER);

        return $api;
    }

    public function getThirdPartyCode(): ThirdPartyCode
    {
        /** @var ThirdPartyCode $api */
        $api = $this->createApi(self::THIRD_PARTY_CODE);

        return $api;
    }

    public function getChampionMastery(): ChampionMastery
    {
        /** @var ChampionMastery $api */
        $api = $this->createApi(self::CHAMPION_MASTERY);

        return $api;
    }

    public function getSpectator(): Spectator
    {
        /** @var Spectator $api */
        $api = $this->createApi(self::SPECTATOR);

        return $api;
    }

    public function getLeague(): League
    {
        /** @var League $api */
        $api = $this->createApi(self::LEAGUE);

        return $api;
    }

    public function getMatch(): Match_
    {
        /** @var Match_ $api */
        $api = $this->createApi(self::MATCH_);

        return $api;
    }

    public function getTournamentStub(): TournamentStub
    {
        /** @var TournamentStub $api */
        $api = $this->createApi(self::TOURNAMENT_STUB);

        return $api;
    }

    public function getTournament(): Tournament
    {
        /** @var Tournament $api */
        $api = $this->createApi(self::TOURNAMENT);

        return $api;
    }

    public function getLeagueExp(): LeagueExp
    {
        /** @var LeagueExp $api */
        $api = $this->createApi(self::LEAGUE_EXP);

        return $api;
    }

    protected function createApiMap(string $key): AbstractApi
    {
        switch ($key) {
            case self::SUMMONER:
                return new Summoner($this->connection);
            case self::THIRD_PARTY_CODE:
                return new ThirdPartyCode($this->connection);
            case self::CHAMPION_MASTERY:
                return new ChampionMastery($this->connection);
            case self::SPECTATOR:
                return new Spectator($this->connection);
            case self::LEAGUE:
                return new League($this->connection);
            case self::MATCH_:
                return new Match_($this->connection);
            case self::TOURNAMENT_STUB:
                return new TournamentStub($this->connection);
            case self::TOURNAMENT:
                return new Tournament($this->connection);
            case self::LEAGUE_EXP:
                return new LeagueExp($this->connection);
            default:
                throw new InvalidApiEndpointException();
        }
    }
}
