<?php

declare(strict_types=1);

namespace Riot\DTO;

use Riot\Collection\ServiceDTOCollection;

final class ShardStatusDTO implements DTOInterface
{
    /** @var array<string> */
    private array $locales;

    private string $hostname;

    private string $name;

    /** @var ServiceDTOCollection<ServiceDTO> */
    private ServiceDTOCollection $services;

    private string $slug;

    private string $regionTag;

    /**
     * @param array<string>                    $locales
     * @param ServiceDTOCollection<ServiceDTO> $services
     */
    public function __construct(
        array $locales,
        string $hostname,
        string $name,
        ServiceDTOCollection $services,
        string $slug,
        string $regionTag
    ) {
        $this->locales = $locales;
        $this->hostname = $hostname;
        $this->name = $name;
        $this->services = $services;
        $this->slug = $slug;
        $this->regionTag = $regionTag;
    }

    /**
     * @return array<string>
     */
    public function getLocales(): array
    {
        return $this->locales;
    }

    public function getHostname(): string
    {
        return $this->hostname;
    }

    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return ServiceDTOCollection<ServiceDTO>
     */
    public function getServices(): ServiceDTOCollection
    {
        return $this->services;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function getRegionTag(): string
    {
        return $this->regionTag;
    }

    public static function createFromArray(array $data): self
    {
        return new self(
            $data['locales'],
            $data['hostname'],
            $data['name'],
            ServiceDTOCollection::createFromArray($data['services']),
            $data['slug'],
            $data['region_tag'],
        );
    }
}
