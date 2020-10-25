<?php

declare(strict_types=1);

namespace Riot\Enum;

use MyCLabs\Enum\Enum;

/**
 * @method static self BLUE()
 * @method static self RED()
 *
 * @extends Enum<int>
 * @psalm-immutable
 */
final class TeamEnum extends Enum
{
    private const BLUE = 100;
    private const RED = 200;
}
