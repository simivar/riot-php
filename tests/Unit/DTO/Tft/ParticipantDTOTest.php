<?php

declare(strict_types=1);

namespace Riot\Tests\Unit\DTO\Tft;

use PHPUnit\Framework\TestCase;
use Riot\Collection\Tft\TraitDTOCollection;
use Riot\Collection\Tft\UnitDTOCollection;
use Riot\DTO\Tft\CompanionDTO;
use Riot\DTO\Tft\ParticipantDTO;

final class ParticipantDTOTest extends TestCase
{
    public function testCreateFromArrayCreatesProperObject(): void
    {
        $data = [
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
        ];
        $object = ParticipantDTO::createFromArray($data);
        self::assertInstanceOf(CompanionDTO::class, $object->getCompanion());
        self::assertSame(115, $object->getGoldLeft());
        self::assertSame(18, $object->getLastRound());
        self::assertSame(5, $object->getLevel());
        self::assertSame(8, $object->getPlacement());
        self::assertSame(0, $object->getPlayersEliminated());
        self::assertSame(
            'nert07kg2F9b86erta_Ho9gB49sSG-ert-P7oamBlmertaqgt6ove_129IertbjaqBobertOuxRcw',
            $object->getPuuid(),
        );
        self::assertSame(1234.4384765625, $object->getTimeEliminated());
        self::assertSame(0, $object->getTotalDamageToPlayers());
        self::assertInstanceOf(TraitDTOCollection::class, $object->getTraits());
        self::assertInstanceOf(UnitDTOCollection::class, $object->getUnits());
    }
}
