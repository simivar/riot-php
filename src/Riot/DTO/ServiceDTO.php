<?php

declare(strict_types=1);

namespace Riot\DTO;

use Riot\Collection\IncidentDTOCollection;

final class ServiceDTO implements DTOInterface
{
    private string $name;

    private string $slug;

    private string $status;

    /** @var IncidentDTOCollection<IncidentDTO> */
    private IncidentDTOCollection $incidents;

    /**
     * @param IncidentDTOCollection<IncidentDTO> $incidents
     */
    public function __construct(string $name, string $slug, string $status, IncidentDTOCollection $incidents)
    {
        $this->name = $name;
        $this->slug = $slug;
        $this->status = $status;
        $this->incidents = $incidents;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @return IncidentDTOCollection<IncidentDTO>
     */
    public function getIncidents(): IncidentDTOCollection
    {
        return $this->incidents;
    }

    public static function createFromArray(array $data): self
    {
        return new self(
            $data['name'],
            $data['slug'],
            $data['status'],
            IncidentDTOCollection::createFromArray($data['incidents']),
        );
    }
}
