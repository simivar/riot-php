<?php

declare(strict_types=1);

namespace Riot\DTO\Lol;

use Riot\Collection\Lol\MasteryDTOCollection;
use Riot\Collection\Lol\RuneDTOCollection;
use Riot\DTO\DTOInterface;

final class ParticipantDTO implements DTOInterface
{
    private int $participantId;

    private int $championId;

    private RuneDTOCollection $runes;

    private ParticipantStatsDTO $stats;

    private int $teamId;

    private ParticipantTimelineDTO $timeline;

    private int $spell1Id;

    private int $spell2Id;

    private ?string $highestAchievedSeasonTier;

    private MasteryDTOCollection $masteries;

    public function __construct(
        int $participantId,
        int $championId,
        RuneDTOCollection $runes,
        ParticipantStatsDTO $stats,
        int $teamId,
        ParticipantTimelineDTO $timeline,
        int $spell1Id,
        int $spell2Id,
        ?string $highestAchievedSeasonTier,
        MasteryDTOCollection $masteries
    ) {
        $this->participantId = $participantId;
        $this->championId = $championId;
        $this->runes = $runes;
        $this->stats = $stats;
        $this->teamId = $teamId;
        $this->timeline = $timeline;
        $this->spell1Id = $spell1Id;
        $this->spell2Id = $spell2Id;
        $this->highestAchievedSeasonTier = $highestAchievedSeasonTier;
        $this->masteries = $masteries;
    }

    public function getParticipantId(): int
    {
        return $this->participantId;
    }

    public function getChampionId(): int
    {
        return $this->championId;
    }

    /**
     * @return RuneDTOCollection<RuneDTO>
     */
    public function getRunes(): RuneDTOCollection
    {
        return $this->runes;
    }

    public function getStats(): ParticipantStatsDTO
    {
        return $this->stats;
    }

    public function getTeamId(): int
    {
        return $this->teamId;
    }

    public function getTimeline(): ParticipantTimelineDTO
    {
        return $this->timeline;
    }

    public function getSpell1Id(): int
    {
        return $this->spell1Id;
    }

    public function getSpell2Id(): int
    {
        return $this->spell2Id;
    }

    public function getHighestAchievedSeasonTier(): ?string
    {
        return $this->highestAchievedSeasonTier;
    }

    /**
     * @return MasteryDTOCollection<MasteryDTO>
     */
    public function getMasteries(): MasteryDTOCollection
    {
        return $this->masteries;
    }

    public static function createFromArray(array $data): self
    {
        $runes = $data['runes'] ?? [];
        $masteries = $data['masteries'] ?? [];

        return new self(
            $data['participantId'],
            $data['championId'],
            RuneDTOCollection::createFromArray($runes),
            ParticipantStatsDTO::createFromArray($data['stats']),
            $data['teamId'],
            ParticipantTimelineDTO::createFromArray($data['timeline']),
            $data['spell1Id'],
            $data['spell2Id'],
            $data['highestAchievedSeasonTier'] ?? null,
            MasteryDTOCollection::createFromArray($masteries),
        );
    }
}
