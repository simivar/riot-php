<?php

declare(strict_types=1);

namespace Riot\DTO;

use Riot\Collection\ContentDTOCollection;
use Riot\Collection\UpdateDTOCollection;

final class StatusDTO implements DTOInterface
{
    private int $id;

    private ?string $maintenanceStatus; //	(Legal values: scheduled, in_progress, complete)

    private ?string $incidentSeverity; //	(Legal values: info, warning, critical)

    private ContentDTOCollection $titles;

    private UpdateDTOCollection $updates;

    private string $createdAt;

    private ?string $archiveAt;

    private ?string $updatedAt;

    /** @var array<string> */
    private array $platforms; //(Legal values: windows, macos, android, ios, ps4, xbone, switch)

    /**
     * @param array<string> $platforms
     */
    public function __construct(
        int $id,
        ?string $maintenanceStatus,
        ?string $incidentSeverity,
        ContentDTOCollection $titles,
        UpdateDTOCollection $updates,
        string $createdAt,
        ?string $archiveAt,
        ?string $updatedAt,
        array $platforms
    ) {
        $this->id = $id;
        $this->maintenanceStatus = $maintenanceStatus;
        $this->incidentSeverity = $incidentSeverity;
        $this->titles = $titles;
        $this->updates = $updates;
        $this->createdAt = $createdAt;
        $this->archiveAt = $archiveAt;
        $this->updatedAt = $updatedAt;
        $this->platforms = $platforms;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getMaintenanceStatus(): ?string
    {
        return $this->maintenanceStatus;
    }

    public function getIncidentSeverity(): ?string
    {
        return $this->incidentSeverity;
    }

    public function getTitles(): ContentDTOCollection
    {
        return $this->titles;
    }

    public function getUpdates(): UpdateDTOCollection
    {
        return $this->updates;
    }

    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    public function getArchiveAt(): ?string
    {
        return $this->archiveAt;
    }

    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }

    /**
     * @return array<string>
     */
    public function getPlatforms(): array
    {
        return $this->platforms;
    }

    public static function createFromArray(array $data): self
    {
        return new self(
            $data['id'],
            $data['maintenance_status'],
            $data['incident_severity'],
            ContentDTOCollection::createFromArray($data['titles']),
            UpdateDTOCollection::createFromArray($data['updates']),
            $data['created_at'],
            $data['archive_at'],
            $data['updated_at'],
            $data['platforms'],
        );
    }
}
