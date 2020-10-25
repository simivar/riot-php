<?php

declare(strict_types=1);

namespace Riot\DTO\Lol;

use Riot\DTO\DTOInterface;
use Riot\Enum\LaneEnum;
use Riot\Enum\RoleEnum;

final class ParticipantTimelineDTO implements DTOInterface
{
    private int $participantId;

    /** @var array<string, float> */
    private array $csDiffPerMinDeltas;

    /** @var array<string, float> */
    private array $damageTakenPerMinDeltas;

    private RoleEnum $role;

    /** @var array<string, float> */
    private array $damageTakenDiffPerMinDeltas;

    /** @var array<string, float> */
    private array $xpPerMinDeltas;

    /** @var array<string, float> */
    private array $xpDiffPerMinDeltas;

    private LaneEnum $lane;

    /** @var array<string, float> */
    private array $creepsPerMinDeltas;

    /** @var array<string, float> */
    private array $goldPerMinDeltas;

    /**
     * @param array<string, float> $csDiffPerMinDeltas
     * @param array<string, float> $damageTakenPerMinDeltas
     * @param array<string, float> $damageTakenDiffPerMinDeltas
     * @param array<string, float> $xpPerMinDeltas
     * @param array<string, float> $xpDiffPerMinDeltas
     * @param array<string, float> $creepsPerMinDeltas
     * @param array<string, float> $goldPerMinDeltas
     */
    public function __construct(
        int $participantId,
        array $csDiffPerMinDeltas,
        array $damageTakenPerMinDeltas,
        RoleEnum $role,
        array $damageTakenDiffPerMinDeltas,
        array $xpPerMinDeltas,
        array $xpDiffPerMinDeltas,
        LaneEnum $lane,
        array $creepsPerMinDeltas,
        array $goldPerMinDeltas
    ) {
        $this->participantId = $participantId;
        $this->csDiffPerMinDeltas = $csDiffPerMinDeltas;
        $this->damageTakenPerMinDeltas = $damageTakenPerMinDeltas;
        $this->role = $role;
        $this->damageTakenDiffPerMinDeltas = $damageTakenDiffPerMinDeltas;
        $this->xpPerMinDeltas = $xpPerMinDeltas;
        $this->xpDiffPerMinDeltas = $xpDiffPerMinDeltas;
        $this->lane = $lane;
        $this->creepsPerMinDeltas = $creepsPerMinDeltas;
        $this->goldPerMinDeltas = $goldPerMinDeltas;
    }

    public function getParticipantId(): int
    {
        return $this->participantId;
    }

    /**
     * @return array<string, float>
     */
    public function getCsDiffPerMinDeltas(): array
    {
        return $this->csDiffPerMinDeltas;
    }

    /**
     * @return array<string, float>
     */
    public function getDamageTakenPerMinDeltas(): array
    {
        return $this->damageTakenPerMinDeltas;
    }

    public function getRole(): RoleEnum
    {
        return $this->role;
    }

    /**
     * @return array<string, float>
     */
    public function getDamageTakenDiffPerMinDeltas(): array
    {
        return $this->damageTakenDiffPerMinDeltas;
    }

    /**
     * @return array<string, float>
     */
    public function getXpPerMinDeltas(): array
    {
        return $this->xpPerMinDeltas;
    }

    /**
     * @return array<string, float>
     */
    public function getXpDiffPerMinDeltas(): array
    {
        return $this->xpDiffPerMinDeltas;
    }

    public function getLane(): LaneEnum
    {
        return $this->lane;
    }

    /**
     * @return array<string, float>
     */
    public function getCreepsPerMinDeltas(): array
    {
        return $this->creepsPerMinDeltas;
    }

    /**
     * @return array<string, float>
     */
    public function getGoldPerMinDeltas(): array
    {
        return $this->goldPerMinDeltas;
    }

    public static function createFromArray(array $data): self
    {
        return new self(
            $data['participantId'],
            $data['csDiffPerMinDeltas'],
            $data['damageTakenPerMinDeltas'],
            new RoleEnum($data['role']),
            $data['damageTakenDiffPerMinDeltas'],
            $data['xpPerMinDeltas'],
            $data['xpDiffPerMinDeltas'],
            new LaneEnum($data['lane']),
            $data['creepsPerMinDeltas'],
            $data['goldPerMinDeltas'],
        );
    }
}
