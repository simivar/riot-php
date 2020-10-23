<?php

declare(strict_types=1);

namespace Riot\Tests\Unit\DTO;

use PHPUnit\Framework\TestCase;
use Riot\Collection\MessageDTOCollection;
use Riot\DTO\MessageDTO;

final class MessageDTOCollectionTest extends TestCase
{
    public function testCreateFromArrayCreatesProperObject(): void
    {
        $data = [
            [
                'id' => '5e27b2f68d0391127f333f21',
                'author' => '',
                'heading' => '10.02',
                'content' => 'Some content',
                'severity' => 'info',
                'created_at' => '2020-01-22T02:27:02.532Z',
                'updated_at' => '2020-01-22T03:27:02.532Z',
                'translations' => [],
            ],
        ];
        $object = MessageDTOCollection::createFromArray($data);
        self::assertFalse($object->isEmpty());
        self::assertInstanceOf(MessageDTO::class, $object->offsetGet(0));
    }

    public function testCreateFromArrayReturnsEmptyCollectionWhenNoData(): void
    {
        $data = [];
        $object = MessageDTOCollection::createFromArray($data);
        self::assertTrue($object->isEmpty());
    }
}
