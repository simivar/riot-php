<?php

declare(strict_types=1);

namespace Riot\Enum;

use MyCLabs\Enum\Enum;

/**
 * @method static self EUN1()
 * @method static self EUW1()
 * @method static self JP1()
 * @method static self KR()
 * @method static self LA1()
 * @method static self LA2()
 * @method static self NA1()
 * @method static self OC1()
 * @method static self TR1()
 * @method static self RU()
 * @method static self PBE()
 *
 * @extends Enum<string>
 */
final class RegionEnum extends Enum
{
    private const BR1 = 'br1';
    private const EUN1 = 'eun1';
    private const EUW1 = 'euw1';
    private const JP1 = 'jp1';
    private const KR = 'kr';
    private const LA1 = 'la1';
    private const LA2 = 'la2';
    private const NA1 = 'na1';
    private const OC1 = 'oc1';
    private const TR1 = 'tr1';
    private const RU = 'ru';
    private const PBE = 'pbe1';
}
