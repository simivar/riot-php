<?php

declare(strict_types=1);

namespace Riot\DTO\Lol;

use Riot\Collection\Lol\ParticipantDTOCollection;
use Riot\Collection\Lol\ParticipantIdentityDTOCollection;
use Riot\Collection\Lol\TeamStatsDTOCollection;
use Riot\DTO\DTOInterface;

final class MatchDTO implements DTOInterface
{
    private int $gameId;

    /** @var ParticipantIdentityDTOCollection<ParticipantIdentityDTO> */
    private ParticipantIdentityDTOCollection $participantIdentities;

    private int $queueId;

    private string $gameType;

    private int $gameDuration;

    /** @var TeamStatsDTOCollection<TeamStatsDTO> */
    private TeamStatsDTOCollection $teams;

    private string $platformId;

    private int $gameCreation;

    private int $seasonId;

    private string $gameVersion;

    private int $mapId;

    private string $gameMode;

    /** @var ParticipantDTOCollection<ParticipantDTO> */
    private ParticipantDTOCollection $participants;

    /**
     * @param ParticipantIdentityDTOCollection<ParticipantIdentityDTO> $participantIdentities
     * @param TeamStatsDTOCollection<TeamStatsDTO>                     $teams
     * @param ParticipantDTOCollection<ParticipantDTO>                 $participants
     */
    public function __construct(
        int $gameId,
        ParticipantIdentityDTOCollection $participantIdentities,
        int $queueId,
        string $gameType,
        int $gameDuration,
        TeamStatsDTOCollection $teams,
        string $platformId,
        int $gameCreation,
        int $seasonId,
        string $gameVersion,
        int $mapId,
        string $gameMode,
        ParticipantDTOCollection $participants
    ) {
        $this->gameId = $gameId;
        $this->participantIdentities = $participantIdentities;
        $this->queueId = $queueId;
        $this->gameType = $gameType;
        $this->gameDuration = $gameDuration;
        $this->teams = $teams;
        $this->platformId = $platformId;
        $this->gameCreation = $gameCreation;
        $this->seasonId = $seasonId;
        $this->gameVersion = $gameVersion;
        $this->mapId = $mapId;
        $this->gameMode = $gameMode;
        $this->participants = $participants;
    }

    public function getGameId(): int
    {
        return $this->gameId;
    }

    /**
     * @return ParticipantIdentityDTOCollection<ParticipantIdentityDTO>
     */
    public function getParticipantIdentities(): ParticipantIdentityDTOCollection
    {
        return $this->participantIdentities;
    }

    public function getQueueId(): int
    {
        return $this->queueId;
    }

    public function getGameType(): string
    {
        return $this->gameType;
    }

    public function getGameDuration(): int
    {
        return $this->gameDuration;
    }

    /**
     * @return TeamStatsDTOCollection<TeamStatsDTO>
     */
    public function getTeams(): TeamStatsDTOCollection
    {
        return $this->teams;
    }

    public function getPlatformId(): string
    {
        return $this->platformId;
    }

    public function getGameCreation(): int
    {
        return $this->gameCreation;
    }

    public function getSeasonId(): int
    {
        return $this->seasonId;
    }

    public function getGameVersion(): string
    {
        return $this->gameVersion;
    }

    public function getMapId(): int
    {
        return $this->mapId;
    }

    public function getGameMode(): string
    {
        return $this->gameMode;
    }

    /**
     * @return ParticipantDTOCollection<ParticipantDTO>
     */
    public function getParticipants(): ParticipantDTOCollection
    {
        return $this->participants;
    }

    public static function createFromArray(array $data): self
    {
        return new self(
            $data['gameId'],
            ParticipantIdentityDTOCollection::createFromArray($data['participantIdentities']),
            $data['queueId'],
            $data['gameType'],
            $data['gameDuration'],
            TeamStatsDTOCollection::createFromArray($data['teams']),
            $data['platformId'],
            $data['gameCreation'],
            $data['seasonId'],
            $data['gameVersion'],
            $data['mapId'],
            $data['gameMode'],
            ParticipantDTOCollection::createFromArray($data['participants']),
        );
    }
}
