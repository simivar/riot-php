<?php

declare(strict_types=1);

namespace Riot\DTO\Clash;

use Riot\Collection\Clash\TournamentPhaseDTOCollection;
use Riot\DTO\DTOInterface;

final class TournamentDTO implements DTOInterface
{
    private int $id;

    private int $themeId;

    private string $nameKey;

    private string $nameKeySecondary;

    /** @var TournamentPhaseDTOCollection<TournamentPhaseDTO> */
    private TournamentPhaseDTOCollection $schedule;

    /**
     * @param TournamentPhaseDTOCollection<TournamentPhaseDTO> $schedule
     */
    public function __construct(
        int $id,
        int $themeId,
        string $nameKey,
        string $nameKeySecondary,
        TournamentPhaseDTOCollection $schedule
    ) {
        $this->id = $id;
        $this->themeId = $themeId;
        $this->nameKey = $nameKey;
        $this->nameKeySecondary = $nameKeySecondary;
        $this->schedule = $schedule;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getThemeId(): int
    {
        return $this->themeId;
    }

    public function getNameKey(): string
    {
        return $this->nameKey;
    }

    public function getNameKeySecondary(): string
    {
        return $this->nameKeySecondary;
    }

    /**
     * @return TournamentPhaseDTOCollection<TournamentPhaseDTO>
     */
    public function getSchedule(): TournamentPhaseDTOCollection
    {
        return $this->schedule;
    }

    public static function createFromArray(array $data): self
    {
        return new self(
            $data['id'],
            $data['themeId'],
            $data['nameKey'],
            $data['nameKeySecondary'],
            TournamentPhaseDTOCollection::createFromArray($data['schedule']),
        );
    }
}
