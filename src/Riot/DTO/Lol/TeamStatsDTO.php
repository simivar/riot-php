<?php

declare(strict_types=1);

namespace Riot\DTO\Lol;

use Riot\Collection\Lol\TeamBansDTOCollection;
use Riot\DTO\DTOInterface;
use Riot\Enum\TeamEnum;
use Riot\Enum\WinEnum;

final class TeamStatsDTO implements DTOInterface
{
    private int $towerKills;

    private int $riftHeraldKills;

    private bool $firstBlood;

    private int $inhibitorKills;

    /** @var TeamBansDTOCollection<TeamBansDTO> */
    private TeamBansDTOCollection $bans;

    private bool $firstBaron;

    private bool $firstDragon;

    private int $dominionVictoryScore;

    private int $dragonKills;

    private int $baronKills;

    private bool $firstInhibitor;

    private bool $firstTower;

    private int $vilemawKills;

    private bool $firstRiftHerald;

    private TeamEnum $teamId;

    private WinEnum $win;

    /**
     * @param TeamBansDTOCollection<TeamBansDTO> $bans
     */
    public function __construct(
        int $towerKills,
        int $riftHeraldKills,
        bool $firstBlood,
        int $inhibitorKills,
        TeamBansDTOCollection $bans,
        bool $firstBaron,
        bool $firstDragon,
        int $dominionVictoryScore,
        int $dragonKills,
        int $baronKills,
        bool $firstInhibitor,
        bool $firstTower,
        int $vilemawKills,
        bool $firstRiftHerald,
        TeamEnum $teamId,
        WinEnum $win
    ) {
        $this->towerKills = $towerKills;
        $this->riftHeraldKills = $riftHeraldKills;
        $this->firstBlood = $firstBlood;
        $this->inhibitorKills = $inhibitorKills;
        $this->bans = $bans;
        $this->firstBaron = $firstBaron;
        $this->firstDragon = $firstDragon;
        $this->dominionVictoryScore = $dominionVictoryScore;
        $this->dragonKills = $dragonKills;
        $this->baronKills = $baronKills;
        $this->firstInhibitor = $firstInhibitor;
        $this->firstTower = $firstTower;
        $this->vilemawKills = $vilemawKills;
        $this->firstRiftHerald = $firstRiftHerald;
        $this->teamId = $teamId;
        $this->win = $win;
    }

    public function getTowerKills(): int
    {
        return $this->towerKills;
    }

    public function getRiftHeraldKills(): int
    {
        return $this->riftHeraldKills;
    }

    public function isFirstBlood(): bool
    {
        return $this->firstBlood;
    }

    public function getInhibitorKills(): int
    {
        return $this->inhibitorKills;
    }

    /**
     * @return TeamBansDTOCollection<TeamBansDTO>
     */
    public function getBans(): TeamBansDTOCollection
    {
        return $this->bans;
    }

    public function isFirstBaron(): bool
    {
        return $this->firstBaron;
    }

    public function isFirstDragon(): bool
    {
        return $this->firstDragon;
    }

    public function getDominionVictoryScore(): int
    {
        return $this->dominionVictoryScore;
    }

    public function getDragonKills(): int
    {
        return $this->dragonKills;
    }

    public function getBaronKills(): int
    {
        return $this->baronKills;
    }

    public function isFirstInhibitor(): bool
    {
        return $this->firstInhibitor;
    }

    public function isFirstTower(): bool
    {
        return $this->firstTower;
    }

    public function getVilemawKills(): int
    {
        return $this->vilemawKills;
    }

    public function isFirstRiftHerald(): bool
    {
        return $this->firstRiftHerald;
    }

    public function getTeamId(): TeamEnum
    {
        return $this->teamId;
    }

    public function getWin(): WinEnum
    {
        return $this->win;
    }

    public static function createFromArray(array $data): self
    {
        return new self(
            $data['towerKills'],
            $data['riftHeraldKills'],
            $data['firstBlood'],
            $data['inhibitorKills'],
            TeamBansDTOCollection::createFromArray($data['bans']),
            $data['firstBaron'],
            $data['firstDragon'],
            $data['dominionVictoryScore'],
            $data['dragonKills'],
            $data['baronKills'],
            $data['firstInhibitor'],
            $data['firstTower'],
            $data['vilemawKills'],
            $data['firstRiftHerald'],
            new TeamEnum($data['teamId']),
            new WinEnum($data['win']),
        );
    }
}
