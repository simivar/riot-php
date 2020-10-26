<?php

declare(strict_types=1);

namespace Riot\Filter;

interface FilterInterface
{
    public function getAsHttpQuery(): string;
}
