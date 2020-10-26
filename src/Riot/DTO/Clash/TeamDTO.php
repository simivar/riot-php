<?php

declare(strict_types=1);

namespace Riot\DTO\Clash;

use Riot\Collection\Clash\PlayerDTOCollection;
use Riot\DTO\DTOInterface;

final class TeamDTO implements DTOInterface
{
    private string $id;

    private int $tournamentId;

    private string $name;

    private int $iconId;

    private int $tier;

    private string $captain;

    private string $abbreviation;

    private PlayerDTOCollection $players;

    public function __construct(
        string $id,
        int $tournamentId,
        string $name,
        int $iconId,
        int $tier,
        string $captain,
        string $abbreviation,
        PlayerDTOCollection $players
    )
    {
        $this->id = $id;
        $this->tournamentId = $tournamentId;
        $this->name = $name;
        $this->iconId = $iconId;
        $this->tier = $tier;
        $this->captain = $captain;
        $this->abbreviation = $abbreviation;
        $this->players = $players;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getTournamentId(): int
    {
        return $this->tournamentId;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getIconId(): int
    {
        return $this->iconId;
    }

    public function getTier(): int
    {
        return $this->tier;
    }

    public function getCaptain(): string
    {
        return $this->captain;
    }

    public function getAbbreviation(): string
    {
        return $this->abbreviation;
    }

    /**
     * @return PlayerDTOCollection<PlayerDTO>
     */
    public function getPlayers(): PlayerDTOCollection
    {
        return $this->players;
    }

    public static function createFromArray(array $data): self
    {
        return new self(
            $data['id'],
            $data['tournamentId'],
            $data['name'],
            $data['iconId'],
            $data['tier'],
            $data['captain'],
            $data['abbreviation'],
            PlayerDTOCollection::createFromArray($data['players']),
        );
    }
}
