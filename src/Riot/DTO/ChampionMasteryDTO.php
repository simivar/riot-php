<?php

declare(strict_types=1);

namespace Riot\DTO;

final class ChampionMasteryDTO implements DTOInterface
{
    private int $championPointsUntilNextLevel;

    private bool $chestGranted;

    private int $championId;

    private int $lastPlayTime;

    private int $championLevel;

    private string $summonerId;

    private int $championPoints;

    private int $championPointsSinceLastLevel;

    private int $tokensEarned;

    public function __construct(
        int $championPointsUntilNextLevel,
        bool $chestGranted,
        int $championId,
        int $lastPlayTime,
        int $championLevel,
        string $summonerId,
        int $championPoints,
        int $championPointsSinceLastLevel,
        int $tokensEarned
    ) {
        $this->championPointsUntilNextLevel = $championPointsUntilNextLevel;
        $this->chestGranted = $chestGranted;
        $this->championId = $championId;
        $this->lastPlayTime = $lastPlayTime;
        $this->championLevel = $championLevel;
        $this->summonerId = $summonerId;
        $this->championPoints = $championPoints;
        $this->championPointsSinceLastLevel = $championPointsSinceLastLevel;
        $this->tokensEarned = $tokensEarned;
    }

    public function getChampionPointsUntilNextLevel(): int
    {
        return $this->championPointsUntilNextLevel;
    }

    public function isChestGranted(): bool
    {
        return $this->chestGranted;
    }

    public function getChampionId(): int
    {
        return $this->championId;
    }

    public function getLastPlayTime(): int
    {
        return $this->lastPlayTime;
    }

    public function getChampionLevel(): int
    {
        return $this->championLevel;
    }

    public function getSummonerId(): string
    {
        return $this->summonerId;
    }

    public function getChampionPoints(): int
    {
        return $this->championPoints;
    }

    public function getChampionPointsSinceLastLevel(): int
    {
        return $this->championPointsSinceLastLevel;
    }

    public function getTokensEarned(): int
    {
        return $this->tokensEarned;
    }

    public static function createFromArray(array $data): self
    {
        return new self(
            $data['championPointsUntilNextLevel'],
            $data['chestGranted'],
            $data['championId'],
            $data['lastPlayTime'],
            $data['championLevel'],
            $data['summonerId'],
            $data['championPoints'],
            $data['championPointsSinceLastLevel'],
            $data['tokensEarned'],
        );
    }
}
