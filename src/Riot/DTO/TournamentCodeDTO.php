<?php

declare(strict_types=1);

namespace Riot\DTO;

use Riot\Enum\MapTypeEnum;
use Riot\Enum\PickTypeEnum;
use Riot\Enum\SpectatorTypeEnum;
use Riot\Enum\TournamentRegionEnum;
use Webmozart\Assert\Assert;

final class TournamentCodeDTO implements DTOInterface
{
    private string $code;

    private SpectatorTypeEnum $spectators;

    private string $lobbyName;

    private string $metaData;

    private string $password;

    private int $teamSize;

    private int $providerId;

    private PickTypeEnum $pickType;

    private int $tournamentId;

    private int $id;

    private TournamentRegionEnum $region;

    private MapTypeEnum $map;

    /** @var array<string> */
    private array $participants;

    /**
     * @param array<string> $participants
     */
    public function __construct(
        string $code,
        SpectatorTypeEnum $spectators,
        string $lobbyName,
        string $metaData,
        string $password,
        int $teamSize,
        int $providerId,
        PickTypeEnum $pickType,
        int $tournamentId,
        int $id,
        TournamentRegionEnum $region,
        MapTypeEnum $map,
        array $participants
    ) {
        Assert::isList($participants);
        Assert::allString($participants);

        $this->code = $code;
        $this->spectators = $spectators;
        $this->lobbyName = $lobbyName;
        $this->metaData = $metaData;
        $this->password = $password;
        $this->teamSize = $teamSize;
        $this->providerId = $providerId;
        $this->pickType = $pickType;
        $this->tournamentId = $tournamentId;
        $this->id = $id;
        $this->region = $region;
        $this->map = $map;
        $this->participants = $participants;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function getSpectators(): SpectatorTypeEnum
    {
        return $this->spectators;
    }

    public function getLobbyName(): string
    {
        return $this->lobbyName;
    }

    public function getMetaData(): string
    {
        return $this->metaData;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getTeamSize(): int
    {
        return $this->teamSize;
    }

    public function getProviderId(): int
    {
        return $this->providerId;
    }

    public function getPickType(): PickTypeEnum
    {
        return $this->pickType;
    }

    public function getTournamentId(): int
    {
        return $this->tournamentId;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getRegion(): TournamentRegionEnum
    {
        return $this->region;
    }

    public function getMap(): MapTypeEnum
    {
        return $this->map;
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
            $data['code'],
            new SpectatorTypeEnum($data['spectators']),
            $data['lobbyName'],
            $data['metaData'],
            $data['password'],
            $data['teamSize'],
            $data['providerId'],
            new PickTypeEnum($data['pickType']),
            $data['tournamentId'],
            $data['id'],
            new TournamentRegionEnum($data['region']),
            new MapTypeEnum($data['map']),
            $data['participants'],
        );
    }
}
