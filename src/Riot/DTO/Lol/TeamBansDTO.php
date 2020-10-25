<?php

declare(strict_types=1);

namespace Riot\DTO\Lol;

use Riot\DTO\DTOInterface;

final class TeamBansDTO implements DTOInterface
{
    private int $championId;

    private int $pickTurn;

    public function __construct(int $championId, int $pickTurn)
    {
        $this->championId = $championId;
        $this->pickTurn = $pickTurn;
    }

    public function getChampionId(): int
    {
        return $this->championId;
    }

    public function getPickTurn(): int
    {
        return $this->pickTurn;
    }

    public static function createFromArray(array $data): self
    {
        return new self(
            $data['championId'],
            $data['pickTurn'],
        );
    }
}
