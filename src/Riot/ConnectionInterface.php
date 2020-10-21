<?php

declare(strict_types=1);

namespace Riot;

use Psr\Http\Message\ResponseInterface;

interface ConnectionInterface
{
    public function get(string $region, string $path): ?ResponseInterface;
}
