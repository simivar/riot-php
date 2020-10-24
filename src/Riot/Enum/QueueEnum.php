<?php

declare(strict_types=1);

namespace Riot\Enum;

use MyCLabs\Enum\Enum;

/**
 * @method static self RANKED_SOLO_5x5()
 * @method static self RANKED_FLEX_SR()
 * @method static self RANKED_FLEX_TT()
 *
 * @extends Enum<string>
 * @psalm-immutable
 */
final class QueueEnum extends Enum
{
    private const RANKED_SOLO_5x5 = 'RANKED_SOLO_5x5';
    private const RANKED_FLEX_SR = 'RANKED_FLEX_SR';
    private const RANKED_FLEX_TT = 'RANKED_FLEX_TT';
}
