<?php

declare(strict_types=1);

namespace Riot\Enum;

use MyCLabs\Enum\Enum;

/**
 * @method static self CHAMPION_KILL()
 * @method static self WARD_PLACED()
 * @method static self WARD_KILL()
 * @method static self BUILDING_KILL()
 * @method static self ELITE_MONSTER_KILL()
 * @method static self ITEM_PURCHASED()
 * @method static self ITEM_SOLD()
 * @method static self ITEM_DESTROYED()
 * @method static self ITEM_UNDO()
 * @method static self SKILL_LEVEL_UP()
 * @method static self ASCENDED_EVENT()
 * @method static self CAPTURE_POINT()
 * @method static self PORO_KING_SUMMON()
 * @extends Enum<string>
 * @psalm-immutable
 */
final class MatchType extends Enum
{
    private const CHAMPION_KILL = 'CHAMPION_KILL';
    private const WARD_PLACED = 'WARD_PLACED';
    private const WARD_KILL = 'WARD_KILL';
    private const BUILDING_KILL = 'BUILDING_KILL';
    private const ELITE_MONSTER_KILL = 'ELITE_MONSTER_KILL';
    private const ITEM_PURCHASED = 'ITEM_PURCHASED';
    private const ITEM_SOLD = 'ITEM_SOLD';
    private const ITEM_DESTROYED = 'ITEM_DESTROYED';
    private const ITEM_UNDO = 'ITEM_UNDO';
    private const SKILL_LEVEL_UP = 'SKILL_LEVEL_UP';
    private const ASCENDED_EVENT = 'ASCENDED_EVENT';
    private const CAPTURE_POINT = 'CAPTURE_POINT';
    private const PORO_KING_SUMMON = 'PORO_KING_SUMMON';
}
