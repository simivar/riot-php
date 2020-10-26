<?php

declare(strict_types=1);

namespace Riot\DTO\Lol;

use Riot\Collection\Lol\MatchEventDTOCollection;
use Riot\DTO\DTOInterface;

final class MatchFrameDTO implements DTOInterface
{
    /** @var array<string, MatchParticipantFrameDTO> */
    private array $participantFrames;

    /** @var MatchEventDTOCollection<MatchEventDTO> */
    private MatchEventDTOCollection $events;

    private int $timestamp;

    /**
     * @param array<string, MatchParticipantFrameDTO> $participantFrames
     * @param MatchEventDTOCollection<MatchEventDTO>  $events
     */
    public function __construct(array $participantFrames, MatchEventDTOCollection $events, int $timestamp)
    {
        $this->participantFrames = $participantFrames;
        $this->events = $events;
        $this->timestamp = $timestamp;
    }

    /**
     * @return array<string, MatchParticipantFrameDTO>
     */
    public function getParticipantFrames(): array
    {
        return $this->participantFrames;
    }

    /**
     * @return MatchEventDTOCollection<MatchEventDTO>
     */
    public function getEvents(): MatchEventDTOCollection
    {
        return $this->events;
    }

    public function getTimestamp(): int
    {
        return $this->timestamp;
    }

    public static function createFromArray(array $data): self
    {
        $frames = [];
        foreach ($data['participantFrames'] as $key => $frame) {
            $frames[(string) $key] = MatchParticipantFrameDTO::createFromArray($frame);
        }

        return new self(
            $frames,
            MatchEventDTOCollection::createFromArray($data['events']),
            $data['timestamp'],
        );
    }
}
