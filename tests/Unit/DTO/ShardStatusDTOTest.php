<?php

declare(strict_types=1);

namespace Riot\Tests\Unit\DTO;

use PHPUnit\Framework\TestCase;
use Riot\Collection\ServiceDTOCollection;
use Riot\DTO\ShardStatusDTO;

final class ShardStatusDTOTest extends TestCase
{
    public function testCreateFromArrayCreatesProperObject(): void
    {
        $data = [
            'locales' => [
                'pl_PL',
            ],
            'hostname' => 'host.test',
            'name' => 'Name',
            'services' => [],
            'slug' => 'host-test',
            'region_tag' => 'region',
        ];
        $object = ShardStatusDTO::createFromArray($data);
        self::assertSame(['pl_PL'], $object->getLocales());
        self::assertSame('host.test', $object->getHostname());
        self::assertSame('Name', $object->getName());
        self::assertInstanceOf(ServiceDTOCollection::class, $object->getServices());
        self::assertSame('host-test', $object->getSlug());
        self::assertSame('region', $object->getRegionTag());
    }
}
