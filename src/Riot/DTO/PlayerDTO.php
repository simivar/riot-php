<?php

declare(strict_types=1);

namespace Riot\DTO;

final class PlayerDTO implements DTOInterface
{
    private string $name;

    private int $rank;

    private int $lp;

    public function __construct(string $name, int $rank, int $lp)
    {
        $this->name = $name;
        $this->rank = $rank;
        $this->lp = $lp;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getRank(): int
    {
        return $this->rank;
    }

    public function getLp(): int
    {
        return $this->lp;
    }

    public static function createFromArray(array $data): self
    {
        return new self(
            $data['name'],
            $data['rank'],
            (int) $data['lp'],
        );
    }
}
