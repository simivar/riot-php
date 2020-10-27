<?php

declare(strict_types=1);

namespace Riot\Enum;

use MyCLabs\Enum\Enum;

/**
 * @method static self SUMMONERS_RIFT()
 * @method static self TWISTED_TREELINE()
 * @method static self HOWLING_ABYSS()
 *
 * @extends Enum<string>
 * @psalm-immutable
 */
final class MapTypeEnum extends Enum
{
    private const SUMMONERS_RIFT = 'SUMMONERS_RIFT';
    private const TWISTED_TREELINE = 'TWISTED_TREELINE';
    private const HOWLING_ABYSS = 'HOWLING_ABYSS';
}
