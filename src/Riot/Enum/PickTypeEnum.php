<?php

declare(strict_types=1);

namespace Riot\Enum;

use MyCLabs\Enum\Enum;

/**
 * @method static self BLIND_PICK()
 * @method static self DRAFT_MODE()
 * @method static self ALL_RANDOM()
 * @method static self TOURNAMENT_DRAFT()
 *
 * @extends Enum<string>
 * @psalm-immutable
 */
final class PickTypeEnum extends Enum
{
    private const BLIND_PICK = 'BLIND_PICK';
    private const DRAFT_MODE = 'DRAFT_MODE';
    private const ALL_RANDOM = 'ALL_RANDOM';
    private const TOURNAMENT_DRAFT = 'TOURNAMENT_DRAFT';
}
