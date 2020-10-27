<?php

declare(strict_types=1);

namespace Riot\Enum;

use MyCLabs\Enum\Enum;

/**
 * @method static self BR()
 * @method static self EUNE()
 * @method static self EUW()
 * @method static self JP()
 * @method static self LAN()
 * @method static self LAS()
 * @method static self NA()
 * @method static self OCE()
 * @method static self PBE()
 * @method static self RU()
 * @method static self TR()
 *
 * @extends Enum<string>
 * @psalm-immutable
 */
final class TournamentRegionEnum extends Enum
{
    private const BR = 'BR';
    private const EUNE = 'EUNE';
    private const EUW = 'EUW';
    private const JP = 'JP';
    private const LAN = 'LAN';
    private const LAS = 'LAS';
    private const NA = 'NA';
    private const OCE = 'OCE';
    private const PBE = 'PBE';
    private const RU = 'RU';
    private const TR = 'TR';
}
