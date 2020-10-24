<?php

declare(strict_types=1);

namespace Riot\DTO;

final class LeagueEntryDTO implements DTOInterface
{
    private string $leagueId;

    private string $summonerId;

    private string $summonerName;

    private string $queueType;

    private string $tier;

    private string $rank;

    private int $leaguePoints;

    private int $wins;

    private int $losses;

    private bool $hotStreak;

    private bool $veteran;

    private bool $freshBlood;

    private bool $inactive;

    private ?MiniSeriesDTO $miniSeries;

    public function __construct(
        string $leagueId,
        string $summonerId,
        string $summonerName,
        string $queueType,
        string $tier,
        string $rank,
        int $leaguePoints,
        int $wins,
        int $losses,
        bool $hotStreak,
        bool $veteran,
        bool $freshBlood,
        bool $inactive,
        ?MiniSeriesDTO $miniSeries
    ) {
        $this->leagueId = $leagueId;
        $this->summonerId = $summonerId;
        $this->summonerName = $summonerName;
        $this->queueType = $queueType;
        $this->tier = $tier;
        $this->rank = $rank;
        $this->leaguePoints = $leaguePoints;
        $this->wins = $wins;
        $this->losses = $losses;
        $this->hotStreak = $hotStreak;
        $this->veteran = $veteran;
        $this->freshBlood = $freshBlood;
        $this->inactive = $inactive;
        $this->miniSeries = $miniSeries;
    }

    public function getLeagueId(): string
    {
        return $this->leagueId;
    }

    public function getSummonerId(): string
    {
        return $this->summonerId;
    }

    public function getSummonerName(): string
    {
        return $this->summonerName;
    }

    public function getQueueType(): string
    {
        return $this->queueType;
    }

    public function getTier(): string
    {
        return $this->tier;
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

    public function getWins(): int
    {
        return $this->wins;
    }

    public function isHotStreak(): bool
    {
        return $this->hotStreak;
    }

    public function isVeteran(): bool
    {
        return $this->veteran;
    }

    public function isFreshBlood(): bool
    {
        return $this->freshBlood;
    }

    public function isInactive(): bool
    {
        return $this->inactive;
    }

    public function getMiniSeries(): ?MiniSeriesDTO
    {
        return $this->miniSeries;
    }

    public static function createFromArray(array $data): self
    {
        return new self(
            $data['leagueId'],
            $data['summonerId'],
            $data['summonerName'],
            $data['queueType'],
            $data['tier'],
            $data['rank'],
            $data['leaguePoints'],
            $data['wins'],
            $data['losses'],
            $data['hotStreak'],
            $data['veteran'],
            $data['freshBlood'],
            $data['inactive'],
            isset($data['miniSeries']) ? MiniSeriesDTO::createFromArray($data['miniSeries']) : null,
        );
    }
}
