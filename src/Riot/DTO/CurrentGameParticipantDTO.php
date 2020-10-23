<?php

declare(strict_types=1);

namespace Riot\DTO;

use Riot\Collection\GameCustomizationObjectDTOCollection;

final class CurrentGameParticipantDTO implements DTOInterface
{
    private int $championId;

    private PerksDTO $perks;

    private int $profileIconId;

    private bool $bot;

    private int $teamId;

    private string $summonerName;

    private string $summonerId;

    private int $spell1Id;

    private int $spell2Id;

    /** @var GameCustomizationObjectDTOCollection<GameCustomizationObjectDTO> */
    private GameCustomizationObjectDTOCollection $gameCustomizationObjects;

    /**
     * @param GameCustomizationObjectDTOCollection<GameCustomizationObjectDTO> $gameCustomizationObjects
     */
    public function __construct(
        int $championId,
        PerksDTO $perks,
        int $profileIconId,
        bool $bot,
        int $teamId,
        string $summonerName,
        string $summonerId,
        int $spell1Id,
        int $spell2Id,
        GameCustomizationObjectDTOCollection $gameCustomizationObjects
    ) {
        $this->championId = $championId;
        $this->perks = $perks;
        $this->profileIconId = $profileIconId;
        $this->bot = $bot;
        $this->teamId = $teamId;
        $this->summonerName = $summonerName;
        $this->summonerId = $summonerId;
        $this->spell1Id = $spell1Id;
        $this->spell2Id = $spell2Id;
        $this->gameCustomizationObjects = $gameCustomizationObjects;
    }

    public function getChampionId(): int
    {
        return $this->championId;
    }

    public function getPerks(): PerksDTO
    {
        return $this->perks;
    }

    public function getProfileIconId(): int
    {
        return $this->profileIconId;
    }

    public function isBot(): bool
    {
        return $this->bot;
    }

    public function getTeamId(): int
    {
        return $this->teamId;
    }

    public function getSummonerName(): string
    {
        return $this->summonerName;
    }

    public function getSummonerId(): string
    {
        return $this->summonerId;
    }

    public function getSpell1Id(): int
    {
        return $this->spell1Id;
    }

    public function getSpell2Id(): int
    {
        return $this->spell2Id;
    }

    /**
     * @return GameCustomizationObjectDTOCollection<GameCustomizationObjectDTO>
     */
    public function getGameCustomizationObjects(): GameCustomizationObjectDTOCollection
    {
        return $this->gameCustomizationObjects;
    }

    public static function createFromArray(array $data): self
    {
        return new self(
            $data['championId'],
            PerksDTO::createFromArray($data['perks']),
            $data['profileIconId'],
            $data['bot'],
            $data['teamId'],
            $data['summonerName'],
            $data['summonerId'],
            $data['spell1Id'],
            $data['spell2Id'],
            GameCustomizationObjectDTOCollection::createFromArray($data['gameCustomizationObjects']),
        );
    }
}
