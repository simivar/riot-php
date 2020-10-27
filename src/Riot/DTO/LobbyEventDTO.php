<?php

declare(strict_types=1);

namespace Riot\DTO;

final class LobbyEventDTO implements DTOInterface
{
    private string $timestamp;

    private string $eventType;

    private string $summonerId;

    public function __construct(string $timestamp, string $eventType, string $summonerId)
    {
        $this->timestamp = $timestamp;
        $this->eventType = $eventType;
        $this->summonerId = $summonerId;
    }

    public function getTimestamp(): string
    {
        return $this->timestamp;
    }

    public function getEventType(): string
    {
        return $this->eventType;
    }

    public function getSummonerId(): string
    {
        return $this->summonerId;
    }

    public static function createFromArray(array $data): self
    {
        return new self(
            $data['timestamp'],
            $data['eventType'],
            $data['summonerId'],
        );
    }
}
