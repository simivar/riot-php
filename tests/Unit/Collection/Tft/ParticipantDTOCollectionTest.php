<?php

declare(strict_types=1);

namespace Riot\Tests\Unit\DTO\Tft;

use PHPUnit\Framework\TestCase;
use Riot\Collection\Tft\ParticipantDTOCollection;
use Riot\DTO\Tft\ParticipantDTO;

final class ParticipantDTOCollectionTest extends TestCase
{
    public function testCreateFromArrayCreatesProperObject(): void
    {
        $data = [
            [
                'companion' => [
                    'content_ID' => '1234ad9f-4665-4372-8f3e-6c878adb8918',
                    'skin_ID' => 1,
                    'species' => 'PetTFTAvatar',
                ],
                'gold_left' => 115,
                'last_round' => 18,
                'level' => 5,
                'placement' => 8,
                'players_eliminated' => 0,
                'puuid' => 'nert07kg2F9b86erta_Ho9gB49sSG-ert-P7oamBlmertaqgt6ove_129IertbjaqBobertOuxRcw',
                'time_eliminated' => 1234.4384765625,
                'total_damage_to_players' => 0,
                'traits' => [
                ],
                'units' => [
                ],
            ],
        ];
        $object = ParticipantDTOCollection::createFromArray($data);
        self::assertFalse($object->isEmpty());
        self::assertInstanceOf(ParticipantDTO::class, $object->offsetGet(0));
    }

    public function testCreateFromArrayReturnsEmptyCollectionWhenNoData(): void
    {
        $data = [];
        $object = ParticipantDTOCollection::createFromArray($data);
        self::assertTrue($object->isEmpty());
    }
}
