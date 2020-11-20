<?php

declare(strict_types=1);

namespace Riot\DTO\Tft;

use Riot\DTO\DTOInterface;

final class UnitDTO implements DTOInterface
{
    /** @var array<int> */
    private array $items;

    private string $characterId;

    private ?string $chosen;

    private string $name;

    private int $rarity;

    private int $tier;

    /**
     * @param array<int> $items
     */
    public function __construct(
        array $items,
        string $characterId,
        ?string $chosen,
        string $name,
        int $rarity,
        int $tier
    ) {
        $this->items = $items;
        $this->characterId = $characterId;
        $this->chosen = $chosen;
        $this->name = $name;
        $this->rarity = $rarity;
        $this->tier = $tier;
    }

    /**
     * @return array<int>
     */
    public function getItems(): array
    {
        return $this->items;
    }

    public function getCharacterId(): string
    {
        return $this->characterId;
    }

    public function getChosen(): ?string
    {
        return $this->chosen;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getRarity(): int
    {
        return $this->rarity;
    }

    public function getTier(): int
    {
        return $this->tier;
    }

    public static function createFromArray(array $data): self
    {
        return new self(
            $data['items'],
            $data['character_id'],
            $data['chosen'] ?? null,
            $data['name'],
            $data['rarity'],
            $data['tier'],
        );
    }
}
