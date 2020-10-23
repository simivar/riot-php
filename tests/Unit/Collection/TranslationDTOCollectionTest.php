<?php

declare(strict_types=1);

namespace Riot\Tests\Unit\DTO;

use PHPUnit\Framework\TestCase;
use Riot\Collection\TranslationDTOCollection;
use Riot\DTO\TranslationDTO;

final class TranslationDTOCollectionTest extends TestCase
{
    public function testCreateFromArrayCreatesProperObject(): void
    {
        $data = [
            [
                'updated_at' => 'a',
                'locale' => 'b',
                'content' => 'c',
            ],
        ];
        $object = TranslationDTOCollection::createFromArray($data);
        self::assertFalse($object->isEmpty());
        self::assertInstanceOf(TranslationDTO::class, $object->offsetGet(0));
    }

    public function testCreateFromArrayReturnsEmptyCollectionWhenNoData(): void
    {
        $data = [];
        $object = TranslationDTOCollection::createFromArray($data);
        self::assertTrue($object->isEmpty());
    }
}
