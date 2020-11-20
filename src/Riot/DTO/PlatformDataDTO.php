<?php

declare(strict_types=1);

namespace Riot\DTO;

use Riot\Collection\StatusDTOCollection;

final class PlatformDataDTO implements DTOInterface
{
    private string $id;

    private string $name;

    /** @var array<string> */
    private array $locales;

    private StatusDTOCollection $maintenances;

    private StatusDTOCollection $incidents;

    /**
     * @param array<string> $locales
     */
    public function __construct(
        string $id,
        string $name,
        array $locales,
        StatusDTOCollection $maintenances,
        StatusDTOCollection $incidents
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->locales = $locales;
        $this->maintenances = $maintenances;
        $this->incidents = $incidents;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return array<string>
     */
    public function getLocales(): array
    {
        return $this->locales;
    }

    public function getMaintenances(): StatusDTOCollection
    {
        return $this->maintenances;
    }

    public function getIncidents(): StatusDTOCollection
    {
        return $this->incidents;
    }

    public static function createFromArray(array $data): self
    {
        return new self(
            $data['id'],
            $data['name'],
            $data['locales'],
            StatusDTOCollection::createFromArray($data['maintenances']),
            StatusDTOCollection::createFromArray($data['incidents']),
        );
    }
}
