<?php

declare(strict_types=1);

namespace Riot\DTO\Tft;

use Riot\Collection\Tft\ParticipantDTOCollection;
use Riot\DTO\DTOInterface;

final class InfoDTO implements DTOInterface
{
    private int $gameDateTime;

    private float $gameLength;

    private ?string $gameVariation;

    private string $gameVersion;

    private ParticipantDTOCollection $participants;

    private int $queueId;

    private int $tftSetNumber;

    public function __construct(
        int $gameDateTime,
        float $gameLength,
        ?string $gameVariation,
        string $gameVersion,
        ParticipantDTOCollection $participants,
        int $queueId,
        int $tftSetNumber
    ) {
        $this->gameDateTime = $gameDateTime;
        $this->gameLength = $gameLength;
        $this->gameVariation = $gameVariation;
        $this->gameVersion = $gameVersion;
        $this->participants = $participants;
        $this->queueId = $queueId;
        $this->tftSetNumber = $tftSetNumber;
    }

    public function getGameDateTime(): int
    {
        return $this->gameDateTime;
    }

    public function getGameLength(): float
    {
        return $this->gameLength;
    }

    public function getGameVariation(): ?string
    {
        return $this->gameVariation;
    }

    public function getGameVersion(): string
    {
        return $this->gameVersion;
    }

    public function getParticipants(): ParticipantDTOCollection
    {
        return $this->participants;
    }

    public function getQueueId(): int
    {
        return $this->queueId;
    }

    public function getTftSetNumber(): int
    {
        return $this->tftSetNumber;
    }

    public static function createFromArray(array $data): self
    {
        return new self(
            $data['game_datetime'],
            $data['game_length'],
            $data['game_variation'] ?? null,
            $data['game_version'],
            ParticipantDTOCollection::createFromArray($data['participants']),
            $data['queue_id'],
            $data['tft_set_number'],
        );
    }
}
