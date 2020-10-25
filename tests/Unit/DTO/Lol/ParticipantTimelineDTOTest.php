<?php

declare(strict_types=1);

namespace Unit\DTO\Lol;

use PHPUnit\Framework\TestCase;
use Riot\DTO\Lol\ParticipantTimelineDTO;
use Riot\Enum\LaneEnum;
use Riot\Enum\RoleEnum;

final class ParticipantTimelineDTOTest extends TestCase
{
    public function testCreateFromArrayCreatesProperObject(): void
    {
        $data = [
            'participantId' => 1,
            'creepsPerMinDeltas' => [
                '10-20' => 6.5,
                '0-10' => 6.4,
                '30-end' => 1.7,
                '20-30' => 0.7,
            ],
            'xpPerMinDeltas' => [
                '10-20' => 533.9,
                '0-10' => 427.4,
                '30-end' => 687.4,
                '20-30' => 219.60000000000002,
            ],
            'goldPerMinDeltas' => [
                '10-20' => 354,
                '0-10' => 265.1,
                '30-end' => 484.70000000000005,
                '20-30' => 237.1,
            ],
            'csDiffPerMinDeltas' => [
                '10-20' => 0.40000000000000036,
                '0-10' => 1.4,
                '30-end' => -1.8,
                '20-30' => -3,
            ],
            'xpDiffPerMinDeltas' => [
                '10-20' => -5,
                '0-10' => -30.799999999999983,
                '30-end' => -37.19999999999999,
                '20-30' => -411.20000000000005,
            ],
            'damageTakenPerMinDeltas' => [
                '10-20' => 866.5,
                '0-10' => 300.3,
                '30-end' => 1228.6999999999998,
                '20-30' => 1306.1,
            ],
            'damageTakenDiffPerMinDeltas' => [
                '10-20' => -294.70000000000005,
                '0-10' => -13.300000000000018,
                '30-end' => -684.2,
                '20-30' => 190.20000000000005,
            ],
            'role' => 'SOLO',
            'lane' => 'MIDDLE',
        ];
        $object = ParticipantTimelineDTO::createFromArray($data);
        self::assertSame(1, $object->getParticipantId());
        self::assertSame([
            '10-20' => 6.5,
            '0-10' => 6.4,
            '30-end' => 1.7,
            '20-30' => 0.7,
        ], $object->getCreepsPerMinDeltas());
        self::assertSame([
            '10-20' => 533.9,
            '0-10' => 427.4,
            '30-end' => 687.4,
            '20-30' => 219.60000000000002,
        ], $object->getXpPerMinDeltas());
        self::assertSame([
            '10-20' => 354,
            '0-10' => 265.1,
            '30-end' => 484.70000000000005,
            '20-30' => 237.1,
        ], $object->getGoldPerMinDeltas());
        self::assertSame([
            '10-20' => 0.40000000000000036,
            '0-10' => 1.4,
            '30-end' => -1.8,
            '20-30' => -3,
        ], $object->getCsDiffPerMinDeltas());
        self::assertSame([
            '10-20' => -5,
            '0-10' => -30.799999999999983,
            '30-end' => -37.19999999999999,
            '20-30' => -411.20000000000005,
        ], $object->getXpDiffPerMinDeltas());
        self::assertSame([
            '10-20' => 866.5,
            '0-10' => 300.3,
            '30-end' => 1228.6999999999998,
            '20-30' => 1306.1,
        ], $object->getDamageTakenPerMinDeltas());
        self::assertSame([
            '10-20' => -294.70000000000005,
            '0-10' => -13.300000000000018,
            '30-end' => -684.2,
            '20-30' => 190.20000000000005,
        ], $object->getDamageTakenDiffPerMinDeltas());
        self::assertInstanceOf(RoleEnum::class, $object->getRole());
        self::assertSame('SOLO', $object->getRole()->getValue());
        self::assertInstanceOf(LaneEnum::class, $object->getLane());
        self::assertSame('MIDDLE', $object->getLane()->getValue());
    }
}
