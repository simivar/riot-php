<?php

declare(strict_types=1);

namespace Riot\Tests\Unit\DTO\Tft;

use PHPUnit\Framework\TestCase;
use Riot\Collection\Tft\ParticipantDTOCollection;
use Riot\DTO\Tft\InfoDTO;

final class InfoDTOTest extends TestCase
{
    public function testCreateFromArrayCreatesProperObject(): void
    {
        $data = [
            'game_datetime' => 1605820001234,
            'game_length' => 1234.362060546875,
            'game_version' => 'Version 10.23.343.2581 (Nov 06 2020/11:12:26) [PUBLIC] <Releases/10.23>',
            'participants' => [],
            'queue_id' => 1090,
            'tft_set_number' => 4,
        ];
        $object = InfoDTO::createFromArray($data);
        self::assertSame(1605820001234, $object->getGameDateTime());
        self::assertSame(1234.362060546875, $object->getGameLength());
        self::assertSame(
            'Version 10.23.343.2581 (Nov 06 2020/11:12:26) [PUBLIC] <Releases/10.23>',
            $object->getGameVersion(),
        );
        self::assertInstanceOf(ParticipantDTOCollection::class, $object->getParticipants());
        self::assertEmpty($object->getParticipants());
        self::assertSame(1090, $object->getQueueId());
        self::assertSame(4, $object->getTftSetNumber());
    }
}
