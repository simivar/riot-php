<?php

declare(strict_types=1);

namespace Riot\DTO;

interface DTOInterface
{
    /**
     * @param array<string, mixed> $data
     */
    public static function createFromArray(array $data): self;
}
