<?php

declare(strict_types=1);

namespace Riot\Enum;

use MyCLabs\Enum\Enum;

/**
 * @method static self WIN()
 * @method static self FAIL()
 *
 * @extends Enum<string>
 * @psalm-immutable
 */
final class WinEnum extends Enum
{
    private const WIN = 'Win';
    private const FAIL = 'Fail';
}
