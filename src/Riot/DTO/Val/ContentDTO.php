<?php

declare(strict_types=1);

namespace Riot\DTO\Val;

use Riot\Collection\Val\ActDTOCollection;
use Riot\Collection\Val\ContentItemDTOCollection;
use Riot\DTO\DTOInterface;

final class ContentDTO implements DTOInterface
{
    private string $version;
    private ContentItemDTOCollection $characters;
    private ContentItemDTOCollection $maps;
    private ContentItemDTOCollection $chromas;
    private ContentItemDTOCollection $skins;
    private ContentItemDTOCollection $skinLevels;
    private ContentItemDTOCollection $equips;
    private ContentItemDTOCollection $gameModes;
    private ContentItemDTOCollection $sprays;
    private ContentItemDTOCollection $sprayLevels;
    private ContentItemDTOCollection $charms;
    private ContentItemDTOCollection $charmLevels;
    private ContentItemDTOCollection $playerCards;
    private ContentItemDTOCollection $playerTitles;
    private ActDTOCollection $acts;

    public function __construct(
        string $version,
        ContentItemDTOCollection $characters,
        ContentItemDTOCollection $maps,
        ContentItemDTOCollection $chromas,
        ContentItemDTOCollection $skins,
        ContentItemDTOCollection $skinLevels,
        ContentItemDTOCollection $equips,
        ContentItemDTOCollection $gameModes,
        ContentItemDTOCollection $sprays,
        ContentItemDTOCollection $sprayLevels,
        ContentItemDTOCollection $charms,
        ContentItemDTOCollection $charmLevels,
        ContentItemDTOCollection $playerCards,
        ContentItemDTOCollection $playerTitles,
        ActDTOCollection $acts
    ) {
        $this->version = $version;
        $this->characters = $characters;
        $this->maps = $maps;
        $this->chromas = $chromas;
        $this->skins = $skins;
        $this->skinLevels = $skinLevels;
        $this->equips = $equips;
        $this->gameModes = $gameModes;
        $this->sprays = $sprays;
        $this->sprayLevels = $sprayLevels;
        $this->charms = $charms;
        $this->charmLevels = $charmLevels;
        $this->playerCards = $playerCards;
        $this->playerTitles = $playerTitles;
        $this->acts = $acts;
    }

    public function getVersion(): string
    {
        return $this->version;
    }

    public function getCharacters(): ContentItemDTOCollection
    {
        return $this->characters;
    }

    public function getMaps(): ContentItemDTOCollection
    {
        return $this->maps;
    }

    public function getChromas(): ContentItemDTOCollection
    {
        return $this->chromas;
    }

    public function getSkins(): ContentItemDTOCollection
    {
        return $this->skins;
    }

    public function getSkinLevels(): ContentItemDTOCollection
    {
        return $this->skinLevels;
    }

    public function getEquips(): ContentItemDTOCollection
    {
        return $this->equips;
    }

    public function getGameModes(): ContentItemDTOCollection
    {
        return $this->gameModes;
    }

    public function getSprays(): ContentItemDTOCollection
    {
        return $this->sprays;
    }

    public function getSprayLevels(): ContentItemDTOCollection
    {
        return $this->sprayLevels;
    }

    public function getCharms(): ContentItemDTOCollection
    {
        return $this->charms;
    }

    public function getCharmLevels(): ContentItemDTOCollection
    {
        return $this->charmLevels;
    }

    public function getPlayerCards(): ContentItemDTOCollection
    {
        return $this->playerCards;
    }

    public function getPlayerTitles(): ContentItemDTOCollection
    {
        return $this->playerTitles;
    }

    public function getActs(): ActDTOCollection
    {
        return $this->acts;
    }

    public static function createFromArray(array $data): self
    {
        return new self(
            $data['version'],
            ContentItemDTOCollection::createFromArray($data['characters']),
            ContentItemDTOCollection::createFromArray($data['maps']),
            ContentItemDTOCollection::createFromArray($data['chromas']),
            ContentItemDTOCollection::createFromArray($data['skins']),
            ContentItemDTOCollection::createFromArray($data['skinLevels']),
            ContentItemDTOCollection::createFromArray($data['equips']),
            ContentItemDTOCollection::createFromArray($data['gameModes']),
            ContentItemDTOCollection::createFromArray($data['sprays']),
            ContentItemDTOCollection::createFromArray($data['sprayLevels']),
            ContentItemDTOCollection::createFromArray($data['charms']),
            ContentItemDTOCollection::createFromArray($data['charmLevels']),
            ContentItemDTOCollection::createFromArray($data['playerCards']),
            ContentItemDTOCollection::createFromArray($data['playerTitles']),
            ActDTOCollection::createFromArray($data['acts']),
        );
    }
}
