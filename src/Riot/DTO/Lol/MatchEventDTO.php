<?php

declare(strict_types=1);

namespace Riot\DTO\Lol;

use Riot\DTO\DTOInterface;
use Riot\Enum\MatchType;
use Riot\Enum\TeamEnum;

final class MatchEventDTO implements DTOInterface
{
    private ?string $laneType;

    private ?int $skillSlot;

    private ?string $ascendedType;

    private ?int $creatorId;

    private ?int $afterId;

    private ?string $eventType;

    private MatchType $type;

    private ?string $levelUpType;

    private ?string $wardType;

    private ?int $participantId;

    private ?string $towerType;

    private ?int $itemId;

    private ?int $beforeId;

    private ?string $pointCaptured;

    private ?string $monsterType;

    private ?string $monsterSubType;

    private ?TeamEnum $teamId;

    private ?MatchPositionDTO $position;

    private ?int $killerId;

    private int $timestamp;

    /** @var array<int>|null */
    private ?array $assistingParticipantIds;

    private ?string $buildingType;

    private ?int $victimId;

    /**
     * @param array<int>|null $assistingParticipantIds
     */
    public function __construct(
        ?string $laneType,
        ?int $skillSlot,
        ?string $ascendedType,
        ?int $creatorId,
        ?int $afterId,
        ?string $eventType,
        MatchType $type,
        ?string $levelUpType,
        ?string $wardType,
        ?int $participantId,
        ?string $towerType,
        ?int $itemId,
        ?int $beforeId,
        ?string $pointCaptured,
        ?string $monsterType,
        ?string $monsterSubType,
        ?TeamEnum $teamId,
        ?MatchPositionDTO $position,
        ?int $killerId,
        int $timestamp,
        ?array $assistingParticipantIds,
        ?string $buildingType,
        ?int $victimId
    ) {
        $this->laneType = $laneType;
        $this->skillSlot = $skillSlot;
        $this->ascendedType = $ascendedType;
        $this->creatorId = $creatorId;
        $this->afterId = $afterId;
        $this->eventType = $eventType;
        $this->type = $type;
        $this->levelUpType = $levelUpType;
        $this->wardType = $wardType;
        $this->participantId = $participantId;
        $this->towerType = $towerType;
        $this->itemId = $itemId;
        $this->beforeId = $beforeId;
        $this->pointCaptured = $pointCaptured;
        $this->monsterType = $monsterType;
        $this->monsterSubType = $monsterSubType;
        $this->teamId = $teamId;
        $this->position = $position;
        $this->killerId = $killerId;
        $this->timestamp = $timestamp;
        $this->assistingParticipantIds = $assistingParticipantIds;
        $this->buildingType = $buildingType;
        $this->victimId = $victimId;
    }

    public function getLaneType(): ?string
    {
        return $this->laneType;
    }

    public function getSkillSlot(): ?int
    {
        return $this->skillSlot;
    }

    public function getAscendedType(): ?string
    {
        return $this->ascendedType;
    }

    public function getCreatorId(): ?int
    {
        return $this->creatorId;
    }

    public function getAfterId(): ?int
    {
        return $this->afterId;
    }

    public function getEventType(): ?string
    {
        return $this->eventType;
    }

    public function getType(): MatchType
    {
        return $this->type;
    }

    public function getLevelUpType(): ?string
    {
        return $this->levelUpType;
    }

    public function getWardType(): ?string
    {
        return $this->wardType;
    }

    public function getParticipantId(): ?int
    {
        return $this->participantId;
    }

    public function getTowerType(): ?string
    {
        return $this->towerType;
    }

    public function getItemId(): ?int
    {
        return $this->itemId;
    }

    public function getBeforeId(): ?int
    {
        return $this->beforeId;
    }

    public function getPointCaptured(): ?string
    {
        return $this->pointCaptured;
    }

    public function getMonsterType(): ?string
    {
        return $this->monsterType;
    }

    public function getMonsterSubType(): ?string
    {
        return $this->monsterSubType;
    }

    public function getTeamId(): ?TeamEnum
    {
        return $this->teamId;
    }

    public function getPosition(): ?MatchPositionDTO
    {
        return $this->position;
    }

    public function getKillerId(): ?int
    {
        return $this->killerId;
    }

    public function getTimestamp(): int
    {
        return $this->timestamp;
    }

    /**
     * @return array<int, int>
     */
    public function getAssistingParticipantIds(): ?array
    {
        return $this->assistingParticipantIds;
    }

    public function getBuildingType(): ?string
    {
        return $this->buildingType;
    }

    public function getVictimId(): ?int
    {
        return $this->victimId;
    }

    public static function createFromArray(array $data): self
    {
        return new self(
            $data['laneType'] ?? null,
            $data['skillSlot'] ?? null,
            $data['ascendedType'] ?? null,
            $data['creatorId'] ?? null,
            $data['afterId'] ?? null,
            $data['eventType'] ?? null,
            new MatchType($data['type']),
            $data['levelUpType'] ?? null,
            $data['wardType'] ?? null,
            $data['participantId'] ?? null,
            $data['towerType'] ?? null,
            $data['itemId'] ?? null,
            $data['beforeId'] ?? null,
            $data['pointCaptured'] ?? null,
            $data['monsterType'] ?? null,
            $data['monsterSubType'] ?? null,
            isset($data['teamId']) ? new TeamEnum($data['teamId']) : null,
            isset($data['position']) ? MatchPositionDTO::createFromArray($data['position']) : null,
            $data['killerId'] ?? null,
            $data['timestamp'],
            $data['assistingParticipantIds'] ?? null,
            $data['buildingType'] ?? null,
            $data['victimId'] ?? null,
        );
    }
}
