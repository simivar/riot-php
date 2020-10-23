<?php

declare(strict_types=1);

namespace Riot\DTO;

use Riot\Collection\MessageDTOCollection;

final class IncidentDTO implements DTOInterface
{
    private int $id;

    private bool $active;

    private string $createdAt;

    /** @var MessageDTOCollection<MessageDTO> */
    private MessageDTOCollection $updates;

    /**
     * @param MessageDTOCollection<MessageDTO> $updates
     */
    public function __construct(int $id, bool $active, string $createdAt, MessageDTOCollection $updates)
    {
        $this->id = $id;
        $this->active = $active;
        $this->createdAt = $createdAt;
        $this->updates = $updates;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function isActive(): bool
    {
        return $this->active;
    }

    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    /**
     * @return MessageDTOCollection<MessageDTO>
     */
    public function getUpdates(): MessageDTOCollection
    {
        return $this->updates;
    }

    public static function createFromArray(array $data): self
    {
        return new self(
            $data['id'],
            $data['active'],
            $data['created_at'],
            MessageDTOCollection::createFromArray($data['updates']),
        );
    }
}
