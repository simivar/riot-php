<?php

declare(strict_types=1);

namespace Riot\DTO\Lol;

use Riot\Collection\Lol\MatchFrameDTOCollection;
use Riot\DTO\DTOInterface;

final class MatchTimelineDTO implements DTOInterface
{
    /** @var MatchFrameDTOCollection<MatchFrameDTO> */
    private MatchFrameDTOCollection $frames;

    private int $frameInterval;

    /**
     * @param MatchFrameDTOCollection<MatchFrameDTO> $frames
     */
    public function __construct(MatchFrameDTOCollection $frames, int $frameInterval)
    {
        $this->frames = $frames;
        $this->frameInterval = $frameInterval;
    }

    /**
     * @return MatchFrameDTOCollection<MatchFrameDTO>
     */
    public function getFrames(): MatchFrameDTOCollection
    {
        return $this->frames;
    }

    public function getFrameInterval(): int
    {
        return $this->frameInterval;
    }

    public static function createFromArray(array $data): self
    {
        return new self(
            MatchFrameDTOCollection::createFromArray($data['frames']),
            $data['frameInterval'],
        );
    }
}
