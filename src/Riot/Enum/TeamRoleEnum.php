<?php

declare(strict_types=1);

namespace Riot\Enum;

use MyCLabs\Enum\Enum;

/**
 * @method static self CAPTAIN()
 * @method static self MEMBER()
 *
 * @extends Enum<string>
 * @psalm-immutable
 */
final class TeamRoleEnum extends Enum
{
    private const CAPTAIN = 'CAPTAIN';
    private const MEMBER = 'MEMBER';
}
