<?php

declare(strict_types=1);

namespace Riot\Enum;

use MyCLabs\Enum\Enum;

/**
 * @method static self NONE()
 * @method static self LOBBYONLY()
 * @method static self ALL()
 *
 * @extends Enum<string>
 * @psalm-immutable
 */
final class SpectatorTypeEnum extends Enum
{
    private const NONE = 'NONE';
    private const LOBBYONLY = 'LOBBYONLY';
    private const ALL = 'ALL';
}
