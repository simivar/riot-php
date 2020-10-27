<?php

declare(strict_types=1);

namespace Riot\Enum;

use MyCLabs\Enum\Enum;

/**
 * @method static self CHALLENGER()
 * @method static self GRANDMASTER()
 * @method static self MASTER()
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
final class TierExpEnum extends Enum
{
    private const CHALLENGER = 'CHALLENGER';
    private const GRANDMASTER = 'GRANDMASTER';
    private const MASTER = 'MASTER';
    private const DIAMOND = 'DIAMOND';
    private const PLATINUM = 'PLATINUM';
    private const GOLD = 'GOLD';
    private const SILVER = 'SILVER';
    private const BRONZE = 'BRONZE';
    private const IRON = 'IRON';
}
