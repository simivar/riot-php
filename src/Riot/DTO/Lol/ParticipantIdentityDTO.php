<?php

declare(strict_types=1);

namespace Riot\DTO\Lol;

use Riot\DTO\DTOInterface;

final class ParticipantIdentityDTO implements DTOInterface
{
    private int $participantId;

    private PlayerDTO $player;

    public function __construct(int $participantId, PlayerDTO $player)
    {
        $this->participantId = $participantId;
        $this->player = $player;
    }

    public function getParticipantId(): int
    {
        return $this->participantId;
    }

    public function getPlayer(): PlayerDTO
    {
        return $this->player;
    }

    public static function createFromArray(array $data): self
    {
        return new self(
            $data['participantId'],
            PlayerDTO::createFromArray($data['player']),
        );
    }
}
