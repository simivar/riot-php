<?php

declare(strict_types=1);

namespace Riot\DTO\Lor;

use Riot\DTO\DTOInterface;

final class PlayerDTO implements DTOInterface
{
    private string $puuid;

    private string $deckId;

    private string $deckCode;

    /** @var array<string> */
    private array $factions;

    private string $gameOutcome;

    private int $orderOfPlay;

    /**
     * @param array<string> $factions
     */
    public function __construct(
        string $puuid,
        string $deckId,
        string $deckCode,
        array $factions,
        string $gameOutcome,
        int $orderOfPlay
    ) {
        $this->puuid = $puuid;
        $this->deckId = $deckId;
        $this->deckCode = $deckCode;
        $this->factions = $factions;
        $this->gameOutcome = $gameOutcome;
        $this->orderOfPlay = $orderOfPlay;
    }

    public function getPuuid(): string
    {
        return $this->puuid;
    }

    public function getDeckId(): string
    {
        return $this->deckId;
    }

    public function getDeckCode(): string
    {
        return $this->deckCode;
    }

    /**
     * @return array<string>
     */
    public function getFactions(): array
    {
        return $this->factions;
    }

    public function getGameOutcome(): string
    {
        return $this->gameOutcome;
    }

    public function getOrderOfPlay(): int
    {
        return $this->orderOfPlay;
    }

    public static function createFromArray(array $data): self
    {
        return new self(
            $data['puuid'],
            $data['deck_id'],
            $data['deck_code'],
            $data['factions'],
            $data['game_outcome'],
            $data['order_of_play'],
        );
    }
}
