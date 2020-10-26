<?php

declare(strict_types=1);

namespace Riot\Enum;

use MyCLabs\Enum\Enum;

/**
 * @method static self MID()
 * @method static self MIDDLE()
 * @method static self TOP()
 * @method static self JUNGLE()
 * @method static self BOT()
 * @method static self BOTTOM()
 *
 * @extends Enum<string>
 * @psalm-immutable
 */
final class LaneEnum extends Enum
{
    private const MID = 'MID';
    private const MIDDLE = 'MIDDLE';
    private const TOP = 'TOP';
    private const JUNGLE = 'JUNGLE';
    private const BOT = 'BOT';
    private const BOTTOM = 'BOTTOM';
}
