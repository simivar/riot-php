<?php

declare(strict_types=1);

namespace Riot\DTO;

use Riot\Collection\BannedChampionDTOCollection;
use Riot\Collection\ParticipantDTOCollection;

final class FeaturedGameInfoDTO implements DTOInterface
{
    private string $gameMode;

    private int $gameLength;

    private int $mapId;

    private string $gameType;

    private BannedChampionDTOCollection $bannedChampions;

    private int $gameId;

    private ObserverDTO $observers;

    private int $gameQueueConfigId;

    private int $gameStartTime;

    private ParticipantDTOCollection $participants;

    private string $platformId;

    public function __construct(
        string $gameMode,
        int $gameLength,
        int $mapId,
        string $gameType,
        BannedChampionDTOCollection $bannedChampions,
        int $gameId,
        ObserverDTO $observers,
        int $gameQueueConfigId,
        int $gameStartTime,
        ParticipantDTOCollection $participants,
        string $platformId
    ) {
        $this->gameMode = $gameMode;
        $this->gameLength = $gameLength;
        $this->mapId = $mapId;
        $this->gameType = $gameType;
        $this->bannedChampions = $bannedChampions;
        $this->gameId = $gameId;
        $this->observers = $observers;
        $this->gameQueueConfigId = $gameQueueConfigId;
        $this->gameStartTime = $gameStartTime;
        $this->participants = $participants;
        $this->platformId = $platformId;
    }

    public function getGameMode(): string
    {
        return $this->gameMode;
    }

    public function getGameLength(): int
    {
        return $this->gameLength;
    }

    public function getMapId(): int
    {
        return $this->mapId;
    }

    public function getGameType(): string
    {
        return $this->gameType;
    }

    /**
     * @return BannedChampionDTOCollection<BannedChampionDTO>
     */
    public function getBannedChampions(): BannedChampionDTOCollection
    {
        return $this->bannedChampions;
    }

    public function getGameId(): int
    {
        return $this->gameId;
    }

    public function getObservers(): ObserverDTO
    {
        return $this->observers;
    }

    public function getGameQueueConfigId(): int
    {
        return $this->gameQueueConfigId;
    }

    public function getGameStartTime(): int
    {
        return $this->gameStartTime;
    }

    /**
     * @return ParticipantDTOCollection<ParticipantDTO>
     */
    public function getParticipants(): ParticipantDTOCollection
    {
        return $this->participants;
    }

    public function getPlatformId(): string
    {
        return $this->platformId;
    }

    public static function createFromArray(array $data): self
    {
        return new self(
            $data['gameMode'],
            $data['gameLength'],
            $data['mapId'],
            $data['gameType'],
            BannedChampionDTOCollection::createFromArray($data['bannedChampions']),
            $data['gameId'],
            ObserverDTO::createFromArray($data['observers']),
            $data['gameQueueConfigId'],
            $data['gameStartTime'],
            ParticipantDTOCollection::createFromArray($data['participants']),
            $data['platformId'],
        );
    }
}
