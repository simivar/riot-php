<?php

declare(strict_types=1);

namespace Riot\DTO\Lol;

use Riot\DTO\DTOInterface;

final class PlayerDTO implements DTOInterface
{
    private int $profileIcon;

    private string $accountId;

    private string $matchHistoryUri;

    private string $currentAccountId;

    private string $currentPlatformId;

    private string $summonerName;

    private string $summonerId;

    private string $platformId;

    public function __construct(
        int $profileIcon,
        string $accountId,
        string $matchHistoryUri,
        string $currentAccountId,
        string $currentPlatformId,
        string $summonerName,
        string $summonerId,
        string $platformId
    ) {
        $this->profileIcon = $profileIcon;
        $this->accountId = $accountId;
        $this->matchHistoryUri = $matchHistoryUri;
        $this->currentAccountId = $currentAccountId;
        $this->currentPlatformId = $currentPlatformId;
        $this->summonerName = $summonerName;
        $this->summonerId = $summonerId;
        $this->platformId = $platformId;
    }

    public function getProfileIcon(): int
    {
        return $this->profileIcon;
    }

    public function getAccountId(): string
    {
        return $this->accountId;
    }

    public function getMatchHistoryUri(): string
    {
        return $this->matchHistoryUri;
    }

    public function getCurrentAccountId(): string
    {
        return $this->currentAccountId;
    }

    public function getCurrentPlatformId(): string
    {
        return $this->currentPlatformId;
    }

    public function getSummonerName(): string
    {
        return $this->summonerName;
    }

    public function getSummonerId(): string
    {
        return $this->summonerId;
    }

    public function getPlatformId(): string
    {
        return $this->platformId;
    }

    public static function createFromArray(array $data): self
    {
        return new self(
            $data['profileIcon'],
            $data['accountId'],
            $data['matchHistoryUri'],
            $data['currentAccountId'],
            $data['currentPlatformId'],
            $data['summonerName'],
            $data['summonerId'],
            $data['platformId'],
        );
    }
}
