<?php

declare(strict_types=1);

namespace Riot\DTO\Lol;

use Riot\DTO\DTOInterface;

final class MatchReferenceDTO implements DTOInterface
{
    private int $gameId;

    private string $role;

    private int $season;

    private string $platformId;

    private int $champion;

    private int $queue;

    private string $lane;

    private int $timestamp;

    public function __construct(
        int $gameId,
        string $role,
        int $season,
        string $platformId,
        int $champion,
        int $queue,
        string $lane,
        int $timestamp
    ) {
        $this->gameId = $gameId;
        $this->role = $role;
        $this->season = $season;
        $this->platformId = $platformId;
        $this->champion = $champion;
        $this->queue = $queue;
        $this->lane = $lane;
        $this->timestamp = $timestamp;
    }

    public function getGameId(): int
    {
        return $this->gameId;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    public function getSeason(): int
    {
        return $this->season;
    }

    public function getPlatformId(): string
    {
        return $this->platformId;
    }

    public function getChampion(): int
    {
        return $this->champion;
    }

    public function getQueue(): int
    {
        return $this->queue;
    }

    public function getLane(): string
    {
        return $this->lane;
    }

    public function getTimestamp(): int
    {
        return $this->timestamp;
    }

    public static function createFromArray(array $data): self
    {
        return new self(
            $data['gameId'],
            $data['role'],
            $data['season'],
            $data['platformId'],
            $data['champion'],
            $data['queue'],
            $data['lane'],
            $data['timestamp'],
        );
    }
}
