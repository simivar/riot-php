<?php

declare(strict_types=1);

namespace Riot\Enum\Tft;

use MyCLabs\Enum\Enum;

/**
 * @method static self NON()
 * @method static self BRONZE()
 * @method static self SILVER()
 * @method static self GOLD()
 * @method static self CHROMATIC()
 *
 * @extends Enum<int>
 * @psalm-immutable
 */
final class TraitStyleEnum extends Enum
{
    private const NON = 0;
    private const BRONZE = 1;
    private const SILVER = 2;
    private const GOLD = 3;
    private const CHROMATIC = 4;
}
