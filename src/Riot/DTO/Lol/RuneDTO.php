<?php

declare(strict_types=1);

namespace Riot\DTO\Lol;

use Riot\DTO\DTOInterface;

final class RuneDTO implements DTOInterface
{
    private int $runeId;

    private int $rank;

    public function __construct(int $runeId, int $rank)
    {
        $this->runeId = $runeId;
        $this->rank = $rank;
    }

    public function getRuneId(): int
    {
        return $this->runeId;
    }

    public function getRank(): int
    {
        return $this->rank;
    }

    public static function createFromArray(array $data): self
    {
        return new self(
            $data['runeId'],
            $data['rank'],
        );
    }
}
