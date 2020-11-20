<?php

declare(strict_types=1);

namespace Riot\DTO\Val;

use Riot\DTO\DTOInterface;

final class ContentItemDTO implements DTOInterface
{
    private string $name;

    private ?LocalizedNamesDTO $localizedNames;

    private string $id;

    private string $assetName;

    private ?string $assetPath;

    public function __construct(
        string $name,
        ?LocalizedNamesDTO $localizedNames,
        string $id,
        string $assetName,
        ?string $assetPath
    ) {
        $this->name = $name;
        $this->localizedNames = $localizedNames;
        $this->id = $id;
        $this->assetName = $assetName;
        $this->assetPath = $assetPath;
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

    public function getAssetName(): string
    {
        return $this->assetName;
    }

    public function getAssetPath(): ?string
    {
        return $this->assetPath;
    }

    public static function createFromArray(array $data): self
    {
        return new self(
            $data['name'],
            isset($data['localizedNames']) ? LocalizedNamesDTO::createFromArray($data['localizedNames']) : null,
            $data['id'],
            $data['assetName'],
            $data['assetPath'] ?? null,
        );
    }
}
