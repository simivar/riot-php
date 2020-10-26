<?php

declare(strict_types=1);

namespace Riot\Tests\Unit\DTO\Clash;

use PHPUnit\Framework\TestCase;
use Riot\DTO\Clash\TournamentPhaseDTO;

final class TournamentPhaseDTOTest extends TestCase
{
    public function testCreateFromArrayCreatesProperObject(): void
    {
        $data = [
            'id' => 1,
            'registrationTime' => 1234567890,
            'startTime' => 1234567891,
            'cancelled' => false,
        ];
        $object = TournamentPhaseDTO::createFromArray($data);
        self::assertSame(1, $object->getId());
        self::assertSame(1234567890, $object->getRegistrationTime());
        self::assertSame(1234567891, $object->getStartTime());
        self::assertFalse($object->isCancelled());
    }
}
