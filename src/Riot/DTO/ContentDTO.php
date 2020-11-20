<?php

declare(strict_types=1);

namespace Riot\DTO;

final class ContentDTO implements DTOInterface
{
    private string $locale;

    private string $content;

    public function __construct(string $locale, string $content)
    {
        $this->locale = $locale;
        $this->content = $content;
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
            $data['locale'],
            $data['content'],
        );
    }
}
