<?php

declare(strict_types=1);

namespace Riot\DTO\Clash;

use Riot\DTO\DTOInterface;
use Riot\Enum\PositionEnum;
use Riot\Enum\TeamRoleEnum;

final class PlayerDTO implements DTOInterface
{
    private string $summonerId;

    private string $teamId;

    private PositionEnum $position;

    private TeamRoleEnum $role;

    public function __construct(
        string $summonerId,
        string $teamId,
        PositionEnum $position,
        TeamRoleEnum $role
    )
    {
        $this->summonerId = $summonerId;
        $this->teamId = $teamId;
        $this->position = $position;
        $this->role = $role;
    }

    public function getSummonerId(): string
    {
        return $this->summonerId;
    }

    public function getTeamId(): string
    {
        return $this->teamId;
    }

    public function getPosition(): PositionEnum
    {
        return $this->position;
    }

    public function getRole(): TeamRoleEnum
    {
        return $this->role;
    }

    public static function createFromArray(array $data): self
    {
        return new self(
            $data['summonerId'],
            $data['teamId'],
            new PositionEnum($data['position']),
            new TeamRoleEnum($data['role']),
        );
    }
}
