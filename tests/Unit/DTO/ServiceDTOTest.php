<?php

declare(strict_types=1);

namespace Riot\Tests\Unit\DTO;

use PHPUnit\Framework\TestCase;
use Riot\Collection\IncidentDTOCollection;
use Riot\DTO\ServiceDTO;

final class ServiceDTOTest extends TestCase
{
    public function testCreateFromArrayCreatesProperObject(): void
    {
        $data = [
            'name' => 'Game',
            'slug' => 'game',
            'status' => 'online',
            'incidents' => [],
        ];
        $object = ServiceDTO::createFromArray($data);
        self::assertSame('Game', $object->getName());
        self::assertSame('game', $object->getSlug());
        self::assertSame('online', $object->getStatus());
        self::assertInstanceOf(IncidentDTOCollection::class, $object->getIncidents());
    }
}
