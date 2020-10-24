<?php

declare(strict_types=1);

namespace Riot\Enum;

use MyCLabs\Enum\Enum;

/**
 * @method static self AMERICAS()
 * @method static self ASIA()
 * @method static self EUROPE()
 *
 * @extends Enum<string>
 */
final class GeoRegionEnum extends Enum
{
    private const AMERICAS = 'americas';
    private const ASIA = 'asia';
    private const EUROPE = 'europe';
}
