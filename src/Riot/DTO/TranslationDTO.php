<?php

declare(strict_types=1);

namespace Riot\DTO;

final class TranslationDTO implements DTOInterface
{
    private ?string $updatedAt;

    private string $locale;

    private string $content;

    public function __construct(?string $updatedAt, string $locale, string $content)
    {
        $this->updatedAt = $updatedAt;
        $this->locale = $locale;
        $this->content = $content;
    }

    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }

    public function getLocale(): string
    {
        return $this->locale;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public static function createFromArray(array $data): self
    {
        return new self(
            $data['updated_at'] ?? null,
            $data['locale'],
            $data['content'],
        );
    }
}
