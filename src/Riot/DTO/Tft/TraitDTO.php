<?php

declare(strict_types=1);

namespace Riot\DTO\Tft;

use Riot\DTO\DTOInterface;
use Riot\Enum\Tft\TraitStyleEnum;

final class TraitDTO implements DTOInterface
{
    private string $name;

    private int $numUnits;

    private TraitStyleEnum $style;

    private int $tierCurrent;

    private int $tierTotal;

    public function __construct(
        string $name,
        int $numUnits,
        TraitStyleEnum $style,
        int $tierCurrent,
        int $tierTotal
    ) {
        $this->name = $name;
        $this->numUnits = $numUnits;
        $this->style = $style;
        $this->tierCurrent = $tierCurrent;
        $this->tierTotal = $tierTotal;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getNumUnits(): int
    {
        return $this->numUnits;
    }

    public function getStyle(): TraitStyleEnum
    {
        return $this->style;
    }

    public function getTierCurrent(): int
    {
        return $this->tierCurrent;
    }

    public function getTierTotal(): int
    {
        return $this->tierTotal;
    }

    public static function createFromArray(array $data): self
    {
        return new self(
            $data['name'],
            $data['num_units'],
            new TraitStyleEnum($data['style']),
            $data['tier_current'],
            $data['tier_total'],
        );
    }
}
