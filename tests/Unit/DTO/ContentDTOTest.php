<?php

declare(strict_types=1);

namespace Riot\Tests\Unit\DTO;

use PHPUnit\Framework\TestCase;
use Riot\DTO\ContentDTO;

final class ContentDTOTest extends TestCase
{
    public function testCreateFromArrayCreatesProperObject(): void
    {
        $data = [
            'locale' => 'en_US',
            'content' => 'Summoner’s Rift Co-op vs AI - Champion Disabled',
        ];
        $object = ContentDTO::createFromArray($data);
        self::assertSame('en_US', $object->getLocale());
        self::assertSame('Summoner’s Rift Co-op vs AI - Champion Disabled', $object->getContent());
    }
}
