<?php

declare(strict_types=1);

namespace Riot\DTO\Clash;

use Riot\DTO\DTOInterface;

final class TournamentPhaseDTO implements DTOInterface
{
    private int $id;

    private int $registrationTime;

    private int $startTime;

    private bool $cancelled;

    public function __construct(
        int $id,
        int $registrationTime,
        int $startTime,
        bool $cancelled
    ) {
        $this->id = $id;
        $this->registrationTime = $registrationTime;
        $this->startTime = $startTime;
        $this->cancelled = $cancelled;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getRegistrationTime(): int
    {
        return $this->registrationTime;
    }

    public function getStartTime(): int
    {
        return $this->startTime;
    }

    public function isCancelled(): bool
    {
        return $this->cancelled;
    }

    public static function createFromArray(array $data): self
    {
        return new self(
            $data['id'],
            $data['registrationTime'],
            $data['startTime'],
            $data['cancelled'],
        );
    }
}
