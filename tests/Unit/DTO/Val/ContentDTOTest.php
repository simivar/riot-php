<?php

declare(strict_types=1);

namespace Riot\Tests\Unit\DTO\Val;

use PHPUnit\Framework\TestCase;
use Riot\Collection\Val\ActDTOCollection;
use Riot\Collection\Val\ContentItemDTOCollection;
use Riot\DTO\Val\ContentDTO;

final class ContentDTOTest extends TestCase
{
    public function testCreateFromArrayCreatesProperObject(): void
    {
        $data = [
            'version' => 'release-01.12',
            'characters' => [],
             'maps' => [],
             'chromas' => [],
             'skins' => [],
             'skinLevels' => [],
             'equips' => [],
             'gameModes' => [],
             'sprays' => [],
             'sprayLevels' => [],
             'charms' => [],
             'charmLevels' => [],
             'playerCards' => [],
             'playerTitles' => [],
             'acts' => [],
        ];
        $object = ContentDTO::createFromArray($data);
        self::assertSame('release-01.12', $object->getVersion());
        self::assertInstanceOf(ContentItemDTOCollection::class, $object->getCharacters());
        self::assertEmpty($object->getCharacters());
        self::assertInstanceOf(ContentItemDTOCollection::class, $object->getMaps());
        self::assertEmpty($object->getMaps());
        self::assertInstanceOf(ContentItemDTOCollection::class, $object->getChromas());
        self::assertEmpty($object->getChromas());
        self::assertInstanceOf(ContentItemDTOCollection::class, $object->getSkins());
        self::assertEmpty($object->getSkins());
        self::assertInstanceOf(ContentItemDTOCollection::class, $object->getSkinLevels());
        self::assertEmpty($object->getSkinLevels());
        self::assertInstanceOf(ContentItemDTOCollection::class, $object->getEquips());
        self::assertEmpty($object->getEquips());
        self::assertInstanceOf(ContentItemDTOCollection::class, $object->getGameModes());
        self::assertEmpty($object->getGameModes());
        self::assertInstanceOf(ContentItemDTOCollection::class, $object->getSprays());
        self::assertEmpty($object->getSprays());
        self::assertInstanceOf(ContentItemDTOCollection::class, $object->getSprayLevels());
        self::assertEmpty($object->getSprayLevels());
        self::assertInstanceOf(ContentItemDTOCollection::class, $object->getCharms());
        self::assertEmpty($object->getCharms());
        self::assertInstanceOf(ContentItemDTOCollection::class, $object->getCharmLevels());
        self::assertEmpty($object->getCharmLevels());
        self::assertInstanceOf(ContentItemDTOCollection::class, $object->getPlayerCards());
        self::assertEmpty($object->getPlayerCards());
        self::assertInstanceOf(ContentItemDTOCollection::class, $object->getPlayerTitles());
        self::assertEmpty($object->getPlayerTitles());
        self::assertInstanceOf(ActDTOCollection::class, $object->getActs());
        self::assertEmpty($object->getActs());
    }
}
