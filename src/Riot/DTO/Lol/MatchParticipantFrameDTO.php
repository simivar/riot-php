<?php

declare(strict_types=1);

namespace Riot\DTO\Lol;

use Riot\DTO\DTOInterface;

final class MatchParticipantFrameDTO implements DTOInterface
{
    private int $participantId;

    private int $minionsKilled;

    private ?int $teamScore;

    private ?int $dominionScore;

    private int $totalGold;

    private int $level;

    private int $xp;

    private int $currentGold;

    private ?MatchPositionDTO $position;

    private int $jungleMinionsKilled;

    public function __construct(
        int $participantId,
        int $minionsKilled,
        ?int $teamScore,
        ?int $dominionScore,
        int $totalGold,
        int $level,
        int $xp,
        int $currentGold,
        ?MatchPositionDTO $position,
        int $jungleMinionsKilled
    ) {
        $this->participantId = $participantId;
        $this->minionsKilled = $minionsKilled;
        $this->teamScore = $teamScore;
        $this->dominionScore = $dominionScore;
        $this->totalGold = $totalGold;
        $this->level = $level;
        $this->xp = $xp;
        $this->currentGold = $currentGold;
        $this->position = $position;
        $this->jungleMinionsKilled = $jungleMinionsKilled;
    }

    public function getParticipantId(): int
    {
        return $this->participantId;
    }

    public function getMinionsKilled(): int
    {
        return $this->minionsKilled;
    }

    public function getTeamScore(): ?int
    {
        return $this->teamScore;
    }

    public function getDominionScore(): ?int
    {
        return $this->dominionScore;
    }

    public function getTotalGold(): int
    {
        return $this->totalGold;
    }

    public function getLevel(): int
    {
        return $this->level;
    }

    public function getXp(): int
    {
        return $this->xp;
    }

    public function getCurrentGold(): int
    {
        return $this->currentGold;
    }

    public function getPosition(): ?MatchPositionDTO
    {
        return $this->position;
    }

    public function getJungleMinionsKilled(): int
    {
        return $this->jungleMinionsKilled;
    }

    public static function createFromArray(array $data): self
    {
        return new self(
            $data['participantId'],
            $data['minionsKilled'],
            $data['teamScore'] ?? null,
            $data['dominionScore'] ?? null,
            $data['totalGold'],
            $data['level'],
            $data['xp'],
            $data['currentGold'],
            isset($data['position']) ? MatchPositionDTO::createFromArray($data['position']) : null,
            $data['jungleMinionsKilled'],
        );
    }
}
