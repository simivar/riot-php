<?php

declare(strict_types=1);

namespace Riot\DTO;

final class MiniSeriesDTO implements DTOInterface
{
    private int $losses;

    private string $progress;

    private int $target;

    private int $wins;

    public function __construct(
        int $losses,
        string $progress,
        int $target,
        int $wins
    ) {
        $this->losses = $losses;
        $this->progress = $progress;
        $this->target = $target;
        $this->wins = $wins;
    }

    public function getLosses(): int
    {
        return $this->losses;
    }

    public function getProgress(): string
    {
        return $this->progress;
    }

    public function getTarget(): int
    {
        return $this->target;
    }

    public function getWins(): int
    {
        return $this->wins;
    }

    public static function createFromArray(array $data): self
    {
        return new self(
            $data['losses'],
            $data['progress'],
            $data['target'],
            $data['wins'],
        );
    }
}
