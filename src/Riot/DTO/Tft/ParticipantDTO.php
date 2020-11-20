<?php

declare(strict_types=1);

namespace Riot\DTO\Tft;

use Riot\Collection\Tft\TraitDTOCollection;
use Riot\Collection\Tft\UnitDTOCollection;
use Riot\DTO\DTOInterface;

final class ParticipantDTO implements DTOInterface
{
    private CompanionDTO $companion;

    private int $goldLeft;

    private int $lastRound;

    private int $level;

    private int $placement;

    private int $playersEliminated;

    private string $puuid;

    private float $timeEliminated;

    private int $totalDamageToPlayers;

    private TraitDTOCollection $traits;

    private UnitDTOCollection $units;

    public function __construct(
        CompanionDTO $companion,
        int $goldLeft,
        int $lastRound,
        int $level,
        int $placement,
        int $playersEliminated,
        string $puuid,
        float $timeEliminated,
        int $totalDamageToPlayers,
        TraitDTOCollection $traits,
        UnitDTOCollection $units
    ) {
        $this->companion = $companion;
        $this->goldLeft = $goldLeft;
        $this->lastRound = $lastRound;
        $this->level = $level;
        $this->placement = $placement;
        $this->playersEliminated = $playersEliminated;
        $this->puuid = $puuid;
        $this->timeEliminated = $timeEliminated;
        $this->totalDamageToPlayers = $totalDamageToPlayers;
        $this->traits = $traits;
        $this->units = $units;
    }

    public function getCompanion(): CompanionDTO
    {
        return $this->companion;
    }

    public function getGoldLeft(): int
    {
        return $this->goldLeft;
    }

    public function getLastRound(): int
    {
        return $this->lastRound;
    }

    public function getLevel(): int
    {
        return $this->level;
    }

    public function getPlacement(): int
    {
        return $this->placement;
    }

    public function getPlayersEliminated(): int
    {
        return $this->playersEliminated;
    }

    public function getPuuid(): string
    {
        return $this->puuid;
    }

    public function getTimeEliminated(): float
    {
        return $this->timeEliminated;
    }

    public function getTotalDamageToPlayers(): int
    {
        return $this->totalDamageToPlayers;
    }

    public function getTraits(): TraitDTOCollection
    {
        return $this->traits;
    }

    public function getUnits(): UnitDTOCollection
    {
        return $this->units;
    }

    public static function createFromArray(array $data): self
    {
        return new self(
            CompanionDTO::createFromArray($data['companion']),
            $data['gold_left'],
            $data['last_round'],
            $data['level'],
            $data['placement'],
            $data['players_eliminated'],
            $data['puuid'],
            $data['time_eliminated'],
            $data['total_damage_to_players'],
            TraitDTOCollection::createFromArray($data['traits']),
            UnitDTOCollection::createFromArray($data['units']),
        );
    }
}
