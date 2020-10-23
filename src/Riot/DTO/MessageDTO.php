<?php

declare(strict_types=1);

namespace Riot\DTO;

use Riot\Collection\TranslationDTOCollection;

final class MessageDTO implements DTOInterface
{
    private string $id;

    private string $author;

    private string $heading;

    private string $content;

    private string $severity;

    private string $createdAt;

    private string $updatedAt;

    /** @var TranslationDTOCollection<TranslationDTO> */
    private TranslationDTOCollection $translations;

    /**
     * @param TranslationDTOCollection<TranslationDTO> $translations
     */
    public function __construct(
        string $id,
        string $author,
        string $heading,
        string $content,
        string $severity,
        string $createdAt,
        string $updatedAt,
        TranslationDTOCollection $translations
    ) {
        $this->id = $id;
        $this->author = $author;
        $this->heading = $heading;
        $this->content = $content;
        $this->severity = $severity;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->translations = $translations;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function getHeading(): string
    {
        return $this->heading;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getSeverity(): string
    {
        return $this->severity;
    }

    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): string
    {
        return $this->updatedAt;
    }

    /**
     * @return TranslationDTOCollection<TranslationDTO>
     */
    public function getTranslations(): TranslationDTOCollection
    {
        return $this->translations;
    }

    public static function createFromArray(array $data): self
    {
        return new self(
            $data['id'],
            $data['author'],
            $data['heading'],
            $data['content'],
            $data['severity'],
            $data['created_at'],
            $data['updated_at'],
            TranslationDTOCollection::createFromArray($data['translations']),
        );
    }
}
