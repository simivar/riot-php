<?php

declare(strict_types=1);

namespace Riot\DTO;

final class BannedChampionDTO implements DTOInterface
{
    private int $pickTurn;

    private int $championId;

    private int $teamId;

    public function __construct(int $pickTurn, int $championId, int $teamId)
    {
        $this->pickTurn = $pickTurn;
        $this->championId = $championId;
        $this->teamId = $teamId;
    }

    public function getPickTurn(): int
    {
        return $this->pickTurn;
    }

    public function getChampionId(): int
    {
        return $this->championId;
    }

    public function getTeamId(): int
    {
        return $this->teamId;
    }

    public static function createFromArray(array $data): self
    {
        return new self(
            $data['pickTurn'],
            $data['championId'],
            $data['teamId'],
        );
    }
}
