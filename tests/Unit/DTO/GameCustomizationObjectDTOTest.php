<?php

declare(strict_types=1);

namespace Riot\Tests\Unit\DTO;

use PHPUnit\Framework\TestCase;
use Riot\DTO\GameCustomizationObjectDTO;

final class GameCustomizationObjectDTOTest extends TestCase
{
    public function testCreateFromArrayCreatesProperObject(): void
    {
        $data = [
            'category' => 'a1',
            'content' => 'b2',
        ];
        $object = GameCustomizationObjectDTO::createFromArray($data);
        self::assertEquals('a1', $object->getCategory());
        self::assertEquals('b2', $object->getContent());
    }
}
