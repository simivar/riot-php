<?php

declare(strict_types=1);

namespace Riot\Enum;

use MyCLabs\Enum\Enum;

/**
 * @method static self DUO()
 * @method static self NONE()
 * @method static self SOLO()
 * @method static self DUO_CARRY()
 * @method static self DUO_SUPPORT()
 *
 * @extends Enum<string>
 * @psalm-immutable
 */
final class RoleEnum extends Enum
{
    private const DUO = 'DUO';
    private const NONE = 'NONE';
    private const SOLO = 'SOLO';
    private const DUO_CARRY = 'DUO_CARRY';
    private const DUO_SUPPORT = 'DUO_SUPPORT';
}
