<?php

declare(strict_types=1);

namespace Riot\DTO;

final class ParticipantDTO implements DTOInterface
{
    private bool $bot;

    private int $spell2Id;

    private int $profileIconId;

    private string $summonerName;

    private int $championId;

    private int $teamId;

    private int $spell1Id;

    public function __construct(
        bool $bot,
        int $spell2Id,
        int $profileIconId,
        string $summonerName,
        int $championId,
        int $teamId,
        int $spell1Id
    ) {
        $this->bot = $bot;
        $this->spell2Id = $spell2Id;
        $this->profileIconId = $profileIconId;
        $this->summonerName = $summonerName;
        $this->championId = $championId;
        $this->teamId = $teamId;
        $this->spell1Id = $spell1Id;
    }

    public function isBot(): bool
    {
        return $this->bot;
    }

    public function getSpell2Id(): int
    {
        return $this->spell2Id;
    }

    public function getProfileIconId(): int
    {
        return $this->profileIconId;
    }

    public function getSummonerName(): string
    {
        return $this->summonerName;
    }

    public function getChampionId(): int
    {
        return $this->championId;
    }

    public function getTeamId(): int
    {
        return $this->teamId;
    }

    public function getSpell1Id(): int
    {
        return $this->spell1Id;
    }

    public static function createFromArray(array $data): self
    {
        return new self(
            $data['bot'],
            $data['spell2Id'],
            $data['profileIconId'],
            $data['summonerName'],
            $data['championId'],
            $data['teamId'],
            $data['spell1Id'],
        );
    }
}
