<?php

declare(strict_types=1);

namespace Riot\DTO;

final class MetadataDTO implements DTOInterface
{
    private string $dataVersion;

    private string $matchId;

    /** @var array<string> */
    private array $participants;

    /**
     * @param array<string> $participants
     */
    public function __construct(string $dataVersion, string $matchId, array $participants)
    {
        $this->dataVersion = $dataVersion;
        $this->matchId = $matchId;
        $this->participants = $participants;
    }

    public function getDataVersion(): string
    {
        return $this->dataVersion;
    }

    public function getMatchId(): string
    {
        return $this->matchId;
    }

    /**
     * @return array<string>
     */
    public function getParticipants(): array
    {
        return $this->participants;
    }

    public static function createFromArray(array $data): self
    {
        return new self(
            $data['data_version'],
            $data['match_id'],
            $data['participants'],
        );
    }
}
