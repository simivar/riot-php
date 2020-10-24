<?php

declare(strict_types=1);

namespace Riot\DTO;

final class LeagueItemDTO implements DTOInterface
{
    private bool $freshBlood;

    private int $wins;

    private string $summonerName;

    private ?MiniSeriesDTO $miniSeries;

    private bool $inactive;

    private bool $veteran;

    private bool $hotStreak;

    private string $rank;

    private int $leaguePoints;

    private int $losses;

    private string $summonerId;

    public function __construct(
        bool $freshBlood,
        int $wins,
        string $summonerName,
        ?MiniSeriesDTO $miniSeries,
        bool $inactive,
        bool $veteran,
        bool $hotStreak,
        string $rank,
        int $leaguePoints,
        int $losses,
        string $summonerId
    ) {
        $this->freshBlood = $freshBlood;
        $this->wins = $wins;
        $this->summonerName = $summonerName;
        $this->miniSeries = $miniSeries;
        $this->inactive = $inactive;
        $this->veteran = $veteran;
        $this->hotStreak = $hotStreak;
        $this->rank = $rank;
        $this->leaguePoints = $leaguePoints;
        $this->losses = $losses;
        $this->summonerId = $summonerId;
    }

    public function isFreshBlood(): bool
    {
        return $this->freshBlood;
    }

    public function getWins(): int
    {
        return $this->wins;
    }

    public function getSummonerName(): string
    {
        return $this->summonerName;
    }

    public function getMiniSeries(): ?MiniSeriesDTO
    {
        return $this->miniSeries;
    }

    public function isInactive(): bool
    {
        return $this->inactive;
    }

    public function isVeteran(): bool
    {
        return $this->veteran;
    }

    public function isHotStreak(): bool
    {
        return $this->hotStreak;
    }

    public function getRank(): string
    {
        return $this->rank;
    }

    public function getLeaguePoints(): int
    {
        return $this->leaguePoints;
    }

    public function getLosses(): int
    {
        return $this->losses;
    }

    public function getSummonerId(): string
    {
        return $this->summonerId;
    }

    public static function createFromArray(array $data): self
    {
        return new self(
            $data['freshBlood'],
            $data['wins'],
            $data['summonerName'],
            isset($data['miniSeries']) ? MiniSeriesDTO::createFromArray($data['miniSeries']) : null,
            $data['inactive'],
            $data['veteran'],
            $data['hotStreak'],
            $data['rank'],
            $data['leaguePoints'],
            $data['losses'],
            $data['summonerId'],
        );
    }
}
