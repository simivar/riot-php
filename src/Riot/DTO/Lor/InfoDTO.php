<?php

declare(strict_types=1);

namespace Riot\DTO\Lor;

use Riot\Collection\Lor\PlayerDTOCollection;
use Riot\DTO\DTOInterface;

final class InfoDTO implements DTOInterface
{
    private string $gameMode;

    private string $gameType;

    private string $gameStartTimeUtc;

    private string $gameVersion;

    /** @var PlayerDTOCollection<PlayerDTO> */
    private PlayerDTOCollection $players;

    private int $totalTurnCount;

    /**
     * @param PlayerDTOCollection<PlayerDTO> $players
     */
    public function __construct(
        string $gameMode,
        string $gameType,
        string $gameStartTimeUtc,
        string $gameVersion,
        PlayerDTOCollection $players,
        int $totalTurnCount
    ) {
        $this->gameMode = $gameMode;
        $this->gameType = $gameType;
        $this->gameStartTimeUtc = $gameStartTimeUtc;
        $this->gameVersion = $gameVersion;
        $this->players = $players;
        $this->totalTurnCount = $totalTurnCount;
    }

    public function getGameMode(): string
    {
        return $this->gameMode;
    }

    public function getGameType(): string
    {
        return $this->gameType;
    }

    public function getGameStartTimeUtc(): string
    {
        return $this->gameStartTimeUtc;
    }

    public function getGameVersion(): string
    {
        return $this->gameVersion;
    }

    /**
     * @return PlayerDTOCollection<PlayerDTO>
     */
    public function getPlayers(): PlayerDTOCollection
    {
        return $this->players;
    }

    public function getTotalTurnCount(): int
    {
        return $this->totalTurnCount;
    }

    public static function createFromArray(array $data): self
    {
        return new self(
            $data['game_mode'],
            $data['game_type'],
            $data['game_start_time_utc'],
            $data['game_version'],
            PlayerDTOCollection::createFromArray($data['players']),
            $data['total_turn_count'],
        );
    }
}
