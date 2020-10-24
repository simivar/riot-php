<?php

declare(strict_types=1);

namespace Riot\DTO;

use Riot\Collection\LeagueItemDTOCollection;

final class LeagueListDTO implements DTOInterface
{
    private string $leagueId;

    /** @var LeagueItemDTOCollection<LeagueItemDTO> */
    private LeagueItemDTOCollection $entries;

    private string $tier;

    private string $name;

    private string $queue;

    /**
     * @param LeagueItemDTOCollection<LeagueItemDTO> $entries
     */
    public function __construct(
        string $leagueId,
        LeagueItemDTOCollection $entries,
        string $tier,
        string $name,
        string $queue
    ) {
        $this->leagueId = $leagueId;
        $this->entries = $entries;
        $this->tier = $tier;
        $this->name = $name;
        $this->queue = $queue;
    }

    public function getLeagueId(): string
    {
        return $this->leagueId;
    }

    /**
     * @return LeagueItemDTOCollection<LeagueItemDTO>
     */
    public function getEntries(): LeagueItemDTOCollection
    {
        return $this->entries;
    }

    public function getTier(): string
    {
        return $this->tier;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getQueue(): string
    {
        return $this->queue;
    }

    public static function createFromArray(array $data): self
    {
        return new self(
            $data['leagueId'],
            LeagueItemDTOCollection::createFromArray($data['entries']),
            $data['tier'],
            $data['name'],
            $data['queue'],
        );
    }
}
