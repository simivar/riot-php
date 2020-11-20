<?php

declare(strict_types=1);

namespace Riot\DTO;

use Riot\Collection\ContentDTOCollection;

final class UpdateDTO implements DTOInterface
{
    private int $id;

    private string $author;

    private bool $publish;

    /** @var array<string> */
    private array $publishLocations;

    private ContentDTOCollection $translations;

    private string $createdAt;

    private string $updatedAt;

    /**
     * @param array<string> $publishLocations
     */
    public function __construct(
        int $id,
        string $author,
        bool $publish,
        array $publishLocations,
        ContentDTOCollection $translations,
        string $createdAt,
        string $updatedAt
    ) {
        $this->id = $id;
        $this->author = $author;
        $this->publish = $publish;
        $this->publishLocations = $publishLocations;
        $this->translations = $translations;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function isPublish(): bool
    {
        return $this->publish;
    }

    /**
     * @return array<string>
     */
    public function getPublishLocations(): array
    {
        return $this->publishLocations;
    }

    public function getTranslations(): ContentDTOCollection
    {
        return $this->translations;
    }

    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): string
    {
        return $this->updatedAt;
    }

    public static function createFromArray(array $data): self
    {
        return new self(
            $data['id'],
            $data['author'],
            $data['publish'],
            $data['publish_locations'],
            ContentDTOCollection::createFromArray($data['translations']),
            $data['created_at'],
            $data['updated_at'],
        );
    }
}
