<?php

declare(strict_types=1);

namespace Riot\DTO;

final class GameCustomizationObjectDTO implements DTOInterface
{
    private string $category;

    private string $content;

    public function __construct(string $category, string $content)
    {
        $this->category = $category;
        $this->content = $content;
    }

    public function getCategory(): string
    {
        return $this->category;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public static function createFromArray(array $data): self
    {
        return new self(
            $data['category'],
            $data['content'],
        );
    }
}
