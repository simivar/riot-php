<?php

declare(strict_types=1);

namespace Riot\DTO;

final class ActiveShardDTO implements DTOInterface
{
    private string $puuid;

    private string $game;

    private string $activeShard;

    public function __construct(string $puuid, string $game, string $activeShard)
    {
        $this->puuid = $puuid;
        $this->game = $game;
        $this->activeShard = $activeShard;
    }

    public function getPuuid(): string
    {
        return $this->puuid;
    }

    public function getGame(): string
    {
        return $this->game;
    }

    public function getActiveShard(): string
    {
        return $this->activeShard;
    }

    public static function createFromArray(array $data): self
    {
        return new self(
            $data['puuid'],
            $data['game'],
            $data['activeShard'],
        );
    }
}
