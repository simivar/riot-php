<?php

declare(strict_types=1);

namespace Riot\DTO\Val;

use Riot\DTO\DTOInterface;

final class ActDTO implements DTOInterface
{
    private string $name;

    private ?LocalizedNamesDTO $localizedNames;

    private string $id;

    private bool $isActive;

    public function __construct(
         string $name,
         ?LocalizedNamesDTO $localizedNames,
         string $id,
         bool $isActive
    ) {
        $this->name = $name;
        $this->localizedNames = $localizedNames;
        $this->id = $id;
        $this->isActive = $isActive;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getLocalizedNames(): ?LocalizedNamesDTO
    {
        return $this->localizedNames;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function isActive(): bool
    {
        return $this->isActive;
    }

    public static function createFromArray(array $data): self
    {
        return new self(
            $data['name'],
            isset($data['localizedNames']) ? LocalizedNamesDTO::createFromArray($data['localizedNames']) : null,
            $data['id'],
            $data['isActive'],
        );
    }
}
