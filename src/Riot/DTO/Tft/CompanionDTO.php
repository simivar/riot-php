<?php

declare(strict_types=1);

namespace Riot\DTO\Tft;

use Riot\DTO\DTOInterface;

final class CompanionDTO implements DTOInterface
{
    private string $contentId;

    private int $skinId;

    private string $species;

    public function __construct(string $contentId, int $skinId, string $species)
    {
        $this->contentId = $contentId;
        $this->skinId = $skinId;
        $this->species = $species;
    }

    public function getContentId(): string
    {
        return $this->contentId;
    }

    public function getSkinId(): int
    {
        return $this->skinId;
    }

    public function getSpecies(): string
    {
        return $this->species;
    }

    public static function createFromArray(array $data): self
    {
        return new self(
            $data['content_ID'],
            $data['skin_ID'],
            $data['species'],
        );
    }
}
