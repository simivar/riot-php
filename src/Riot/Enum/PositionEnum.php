<?php

declare(strict_types=1);

namespace Riot\Enum;

use MyCLabs\Enum\Enum;

/**
 * @method static self UNSELECTED()
 * @method static self FILL()
 * @method static self TOP()
 * @method static self JUNGLE()
 * @method static self MIDDLE()
 * @method static self BOTTOM()
 * @method static self UTILITY()
 *
 * @extends Enum<string>
 * @psalm-immutable
 */
final class PositionEnum extends Enum
{
    private const UNSELECTED = 'UNSELECTED';
    private const FILL = 'FILL';
    private const TOP = 'TOP';
    private const JUNGLE = 'JUNGLE';
    private const MIDDLE = 'MIDDLE';
    private const BOTTOM = 'BOTTOM';
    private const UTILITY = 'UTILITY';
}
