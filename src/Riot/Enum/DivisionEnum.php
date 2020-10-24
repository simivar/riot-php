<?php

declare(strict_types=1);

namespace Riot\Enum;

use MyCLabs\Enum\Enum;

/**
 * @method static self I()
 * @method static self II()
 * @method static self III()
 * @method static self IV()
 *
 * @extends Enum<string>
 * @psalm-immutable
 */
final class DivisionEnum extends Enum
{
    private const I = 'I';
    private const II = 'II';
    private const III = 'III';
    private const IV = 'IV';
}
