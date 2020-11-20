<?php

declare(strict_types=1);

namespace Riot\DTO\Tft;

use Riot\DTO\DTOInterface;

final class MatchDTO implements DTOInterface
{
    private MetadataDTO $metadata;

    private InfoDTO $info;

    public function __construct(MetadataDTO $metadata, InfoDTO $info)
    {
        $this->metadata = $metadata;
        $this->info = $info;
    }

    public function getMetadata(): MetadataDTO
    {
        return $this->metadata;
    }

    public function getInfo(): InfoDTO
    {
        return $this->info;
    }

    public static function createFromArray(array $data): self
    {
        return new static(
            MetadataDTO::createFromArray($data['metadata']),
            InfoDTO::createFromArray($data['info']),
        );
    }
}
