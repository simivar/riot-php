<?php

declare(strict_types=1);

namespace Riot\DTO;

use Riot\Collection\BannedChampionDTOCollection;
use Riot\Collection\CurrentGameParticipantDTOCollection;

final class CurrentGameInfoDTO implements DTOInterface
{
    private int $gameId;

    private string $gameType;

    private int $gameStartTime;

    private int $mapId;

    private int $gameLength;

    private string $platformId;

    private string $gameMode;

    /** @var BannedChampionDTOCollection<BannedChampionDTO> */
    private BannedChampionDTOCollection $bannedChampions;

    private int $gameQueueConfigId;

    private ObserverDTO $observers;

    /** @var CurrentGameParticipantDTOCollection<CurrentGameParticipantDTO> */
    private CurrentGameParticipantDTOCollection $participants;

    /**
     * @param BannedChampionDTOCollection<BannedChampionDTO>                 $bannedChampions
     * @param CurrentGameParticipantDTOCollection<CurrentGameParticipantDTO> $participants
     */
    public function __construct(
        int $gameId,
        string $gameType,
        int $gameStartTime,
        int $mapId,
        int $gameLength,
        string $platformId,
        string $gameMode,
        BannedChampionDTOCollection $bannedChampions,
        int $gameQueueConfigId,
        ObserverDTO $observers,
        CurrentGameParticipantDTOCollection $participants
    ) {
        $this->gameId = $gameId;
        $this->gameType = $gameType;
        $this->gameStartTime = $gameStartTime;
        $this->mapId = $mapId;
        $this->gameLength = $gameLength;
        $this->platformId = $platformId;
        $this->gameMode = $gameMode;
        $this->bannedChampions = $bannedChampions;
        $this->gameQueueConfigId = $gameQueueConfigId;
        $this->observers = $observers;
        $this->participants = $participants;
    }

    public function getGameId(): int
    {
        return $this->gameId;
    }

    public function getGameType(): string
    {
        return $this->gameType;
    }

    public function getGameStartTime(): int
    {
        return $this->gameStartTime;
    }

    public function getMapId(): int
    {
        return $this->mapId;
    }

    public function getGameLength(): int
    {
        return $this->gameLength;
    }

    public function getPlatformId(): string
    {
        return $this->platformId;
    }

    public function getGameMode(): string
    {
        return $this->gameMode;
    }

    /**
     * @return BannedChampionDTOCollection<BannedChampionDTO>
     */
    public function getBannedChampions(): BannedChampionDTOCollection
    {
        return $this->bannedChampions;
    }

    public function getGameQueueConfigId(): int
    {
        return $this->gameQueueConfigId;
    }

    public function getObservers(): ObserverDTO
    {
        return $this->observers;
    }

    /**
     * @return CurrentGameParticipantDTOCollection<CurrentGameParticipantDTO>
     */
    public function getParticipants(): CurrentGameParticipantDTOCollection
    {
        return $this->participants;
    }

    public static function createFromArray(array $data): self
    {
        return new self(
            $data['gameId'],
            $data['gameType'],
            $data['gameStartTime'],
            $data['mapId'],
            $data['gameLength'],
            $data['platformId'],
            $data['gameMode'],
            BannedChampionDTOCollection::createFromArray($data['bannedChampions']),
            $data['gameQueueConfigId'],
            ObserverDTO::createFromArray($data['observers']),
            CurrentGameParticipantDTOCollection::createFromArray($data['participants']),
        );
    }
}
