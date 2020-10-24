<?php

declare(strict_types=1);

namespace Riot\Enum;

use MyCLabs\Enum\Enum;

/**
 * @method static self DIAMOND()
 * @method static self PLATINUM()
 * @method static self GOLD()
 * @method static self SILVER()
 * @method static self BRONZE()
 * @method static self IRON()
 *
 * @extends Enum<string>
 * @psalm-immutable
 */
final class TierEnum extends Enum
{
    private const DIAMOND = 'DIAMOND';
    private const PLATINUM = 'PLATINUM';
    private const GOLD = 'GOLD';
    private const SILVER = 'SILVER';
    private const BRONZE = 'BRONZE';
    private const IRON = 'IRON';
}
