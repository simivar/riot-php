<?php

declare(strict_types=1);

namespace Riot\Tests\Unit\DTO\Val;

use PHPUnit\Framework\TestCase;
use Riot\DTO\Val\ContentItemDTO;

final class ContentItemDTOTest extends TestCase
{
    public function testCreateFromArrayCreatesProperObject(): void
    {
        $data = [
            'name' => 'Raze',
            'id' => 'F94C3B30-42BE-E959-889C-5AA313DBA261',
            'assetName' => 'Default__Clay_PrimaryAsset_C',
        ];
        $object = ContentItemDTO::createFromArray($data);
        self::assertSame('Raze', $object->getName());
        self::assertSame('F94C3B30-42BE-E959-889C-5AA313DBA261', $object->getId());
        self::assertSame('Default__Clay_PrimaryAsset_C', $object->getAssetName());
        self::assertNull($object->getLocalizedNames());
        self::assertNull($object->getAssetPath());
    }
}
