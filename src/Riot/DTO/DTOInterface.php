<?php

declare(strict_types=1);

namespace Riot\DTO;

interface DTOInterface
{
    public static function createFromArray(array $data): self;
}
