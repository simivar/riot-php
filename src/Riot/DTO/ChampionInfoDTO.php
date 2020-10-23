<?php

declare(strict_types=1);

namespace Riot\DTO;

final class ChampionInfoDTO implements DTOInterface
{
    private int $maxNewPlayerLevel;

    /** @var array<int> */
    private array $freeChampionIdsForNewPlayers;

    /** @var array<int> */
    private array $freeChampionIds;

    /**
     * @param array<int> $freeChampionIdsForNewPlayers
     * @param array<int> $freeChampionIds
     */
    public function __construct(
        int $maxNewPlayerLevel,
        array $freeChampionIdsForNewPlayers,
        array $freeChampionIds
    ) {
        $this->maxNewPlayerLevel = $maxNewPlayerLevel;
        $this->freeChampionIdsForNewPlayers = $freeChampionIdsForNewPlayers;
        $this->freeChampionIds = $freeChampionIds;
    }

    public function getMaxNewPlayerLevel(): int
    {
        return $this->maxNewPlayerLevel;
    }

    /**
     * @return array<int>
     */
    public function getFreeChampionIdsForNewPlayers(): array
    {
        return $this->freeChampionIdsForNewPlayers;
    }

    /**
     * @return array<int>
     */
    public function getFreeChampionIds(): array
    {
        return $this->freeChampionIds;
    }

    public static function createFromArray(array $data): self
    {
        return new self(
            $data['maxNewPlayerLevel'],
            $data['freeChampionIdsForNewPlayers'],
            $data['freeChampionIds'],
        );
    }
}
