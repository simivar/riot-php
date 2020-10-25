<?php

declare(strict_types=1);

namespace Riot\DTO\Lol;

use Riot\DTO\DTOInterface;

final class MasteryDTO implements DTOInterface
{
    private int $rank;

    private int $masteryId;

    public function __construct(int $rank, int $masteryId)
    {
        $this->rank = $rank;
        $this->masteryId = $masteryId;
    }

    public function getRank(): int
    {
        return $this->rank;
    }

    public function getMasteryId(): int
    {
        return $this->masteryId;
    }

    public static function createFromArray(array $data): self
    {
        return new self(
            $data['rank'],
            $data['masteryId'],
        );
    }
}
