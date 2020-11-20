<?php

declare(strict_types=1);

namespace Riot\Enum;

use MyCLabs\Enum\Enum;

/**
 * @method static self AP()
 * @method static self BR()
 * @method static self EU()
 * @method static self KR()
 * @method static self LATAM()
 * @method static self NA()
 *
 * @extends Enum<string>
 * @psalm-immutable
 */
final class ValRegionEnum extends Enum
{
    private const AP = 'AP';
    private const BR = 'BR';
    private const EU = 'EU';
    private const KR = 'KR';
    private const LATAM = 'LATAM';
    private const NA = 'NA';
}
