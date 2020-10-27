<?php

declare(strict_types=1);

namespace Riot\Tests\Unit\DTO;

use PHPUnit\Framework\TestCase;
use Riot\Collection\LobbyEventDTOCollection;
use Riot\DTO\LobbyEventDTOWrapperDTO;

final class LobbyEventDTOWrapperDTOTest extends TestCase
{
    public function testCreateFromArrayCreatesProperObject(): void
    {
        $data = [
            'eventList' => [],
        ];
        $object = LobbyEventDTOWrapperDTO::createFromArray($data);
        self::assertInstanceOf(LobbyEventDTOCollection::class, $object->getEventList());
    }
}
