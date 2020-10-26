<?php

declare(strict_types=1);

namespace Riot\Tests\Unit\DTO\Lol;

use PHPUnit\Framework\TestCase;
use Riot\DTO\Lol\MatchEventDTO;
use Riot\DTO\Lol\MatchPositionDTO;
use Riot\Enum\TeamEnum;

final class MatchEventDTOTest extends TestCase
{
    public function testCreateFromArrayCreatesProperObjectOnItemPurchased(): void
    {
        $data = [
            'type' => 'ITEM_PURCHASED',
            'timestamp' => 9121,
            'participantId' => 7,
            'itemId' => 3340,
        ];
        $object = MatchEventDTO::createFromArray($data);
        self::assertSame('ITEM_PURCHASED', $object->getType()->getValue());
        self::assertSame(9121, $object->getTimestamp());
        self::assertSame(7, $object->getParticipantId());
        self::assertSame(3340, $object->getItemId());
    }

    public function testCreateFromArrayCreatesProperObjectOnSkillLevelUp(): void
    {
        $data = [
            'type' => 'SKILL_LEVEL_UP',
            'timestamp' => 10806,
            'participantId' => 7,
            'skillSlot' => 3,
            'levelUpType' => 'NORMAL',
        ];
        $object = MatchEventDTO::createFromArray($data);
        self::assertSame('SKILL_LEVEL_UP', $object->getType()->getValue());
        self::assertSame(10806, $object->getTimestamp());
        self::assertSame(7, $object->getParticipantId());
        self::assertSame(3, $object->getSkillSlot());
        self::assertSame('NORMAL', $object->getLevelUpType());
    }

    public function testCreateFromArrayCreatesProperObjectOnWardPlaced(): void
    {
        $data = [
            'type' => 'WARD_PLACED',
            'timestamp' => 82425,
            'wardType' => 'YELLOW_TRINKET',
            'creatorId' => 7,
        ];
        $object = MatchEventDTO::createFromArray($data);
        self::assertSame('WARD_PLACED', $object->getType()->getValue());
        self::assertSame(82425, $object->getTimestamp());
        self::assertSame('YELLOW_TRINKET', $object->getWardType());
        self::assertSame(7, $object->getCreatorId());
    }

    public function testCreateFromArrayCreatesProperObjectOnItemDestroyed(): void
    {
        $data = [
            'type' => 'ITEM_DESTROYED',
            'timestamp' => 98873,
            'participantId' => 10,
            'itemId' => 2003,
        ];
        $object = MatchEventDTO::createFromArray($data);
        self::assertSame('ITEM_DESTROYED', $object->getType()->getValue());
        self::assertSame(98873, $object->getTimestamp());
        self::assertSame(10, $object->getParticipantId());
        self::assertSame(2003, $object->getItemId());
    }

    public function testCreateFromArrayCreatesProperObjectOnChampionKill(): void
    {
        $data = [
            'type' => 'CHAMPION_KILL',
            'timestamp' => 229959,
            'position' => [
                'x' => 13304,
                'y' => 3201,
            ],
            'killerId' => 6,
            'victimId' => 4,
            'assistingParticipantIds' => [
                8,
            ],
        ];
        $object = MatchEventDTO::createFromArray($data);
        self::assertSame('CHAMPION_KILL', $object->getType()->getValue());
        self::assertSame(229959, $object->getTimestamp());
        self::assertInstanceOf(MatchPositionDTO::class, $object->getPosition());
        self::assertSame(6, $object->getKillerId());
        self::assertSame(4, $object->getVictimId());
        self::assertIsArray($object->getAssistingParticipantIds());
        self::assertArrayHasKey(0, $object->getAssistingParticipantIds());
        self::assertSame(8, $object->getAssistingParticipantIds()[0]);
    }

    public function testCreateFromArrayCreatesProperObjectOnItemUndo(): void
    {
        $data = [
            'type' => 'ITEM_UNDO',
            'timestamp' => 434436,
            'participantId' => 6,
            'afterId' => 0,
            'beforeId' => 1042,
        ];
        $object = MatchEventDTO::createFromArray($data);
        self::assertSame('ITEM_UNDO', $object->getType()->getValue());
        self::assertSame(434436, $object->getTimestamp());
        self::assertSame(6, $object->getParticipantId());
        self::assertSame(0, $object->getAfterId());
        self::assertSame(1042, $object->getBeforeId());
    }

    public function testCreateFromArrayCreatesProperObjectOnEliteMonsterKill(): void
    {
        $data = [
            'type' => 'ELITE_MONSTER_KILL',
            'timestamp' => 448241,
            'position' => [
                'x' => 9866,
                'y' => 4414,
            ],
            'killerId' => 2,
            'monsterType' => 'DRAGON',
            'monsterSubType' => 'WATER_DRAGON',
        ];
        $object = MatchEventDTO::createFromArray($data);
        self::assertSame('ELITE_MONSTER_KILL', $object->getType()->getValue());
        self::assertSame(448241, $object->getTimestamp());
        self::assertInstanceOf(MatchPositionDTO::class, $object->getPosition());
        self::assertSame(2, $object->getKillerId());
        self::assertSame('DRAGON', $object->getMonsterType());
        self::assertSame('WATER_DRAGON', $object->getMonsterSubType());
    }

    public function testCreateFromArrayCreatesProperObjectOnWardKill(): void
    {
        $data = [
            'type' => 'WARD_KILL',
            'timestamp' => 394468,
            'wardType' => 'YELLOW_TRINKET',
            'killerId' => 8,
        ];
        $object = MatchEventDTO::createFromArray($data);
        self::assertSame('WARD_KILL', $object->getType()->getValue());
        self::assertSame(394468, $object->getTimestamp());
        self::assertSame('YELLOW_TRINKET', $object->getWardType());
        self::assertSame(8, $object->getKillerId());
    }

    public function testCreateFromArrayCreatesProperObjectOnBuildingKill(): void
    {
        $data = [
            'type' => 'BUILDING_KILL',
            'timestamp' => 918156,
            'position' => [
                'x' => 981,
                'y' => 10441,
            ],
            'killerId' => 9,
            'assistingParticipantIds' => [],
            'teamId' => 100,
            'buildingType' => 'TOWER_BUILDING',
            'laneType' => 'TOP_LANE',
            'towerType' => 'OUTER_TURRET',
        ];
        $object = MatchEventDTO::createFromArray($data);
        self::assertSame('BUILDING_KILL', $object->getType()->getValue());
        self::assertSame(918156, $object->getTimestamp());
        self::assertInstanceOf(MatchPositionDTO::class, $object->getPosition());
        self::assertSame(9, $object->getKillerId());
        self::assertEmpty($object->getAssistingParticipantIds());
        self::assertInstanceOf(TeamEnum::class, $object->getTeamId());
        self::assertSame(100, $object->getTeamId()->getValue());
        self::assertSame('TOWER_BUILDING', $object->getBuildingType());
        self::assertSame('TOP_LANE', $object->getLaneType());
        self::assertSame('OUTER_TURRET', $object->getTowerType());
    }

    public function testCreateFromArrayCreatesProperObjectOnItemSold(): void
    {
        $data = [
            'type' => 'ITEM_SOLD',
            'timestamp' => 1114374,
            'participantId' => 5,
            'itemId' => 1055,
        ];
        $object = MatchEventDTO::createFromArray($data);
        self::assertSame('ITEM_SOLD', $object->getType()->getValue());
        self::assertSame(1114374, $object->getTimestamp());
        self::assertSame(5, $object->getParticipantId());
        self::assertSame(1055, $object->getItemId());
    }
}
