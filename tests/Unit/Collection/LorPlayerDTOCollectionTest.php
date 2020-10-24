<?php

declare(strict_types=1);

namespace Riot\Tests\Unit\DTO;

use PHPUnit\Framework\TestCase;
use Riot\Collection\LorPlayerDTOCollection;
use Riot\DTO\LorPlayerDTO;

final class LorPlayerDTOCollectionTest extends TestCase
{
    public function testCreateFromArrayCreatesProperObject(): void
    {
        $data = [
            [
                'puuid' => 'aaaa123f99qdPsswfrbER4CURy3iz6vkdrN1sF6-ApDMgsocqU9L1GEFNadd6yKr_uK_s7RPNZi_qg',
                'deck_id' => '1234564-cdec-44c6-b0a3-cb21853c1879',
                'deck_code' => 'AAAAAAYBAEDRMGREFYZDKCABAABQMCYSCQNB2JYCAQAQABYMFIWAMAIBBEKCAIRHFE',
                'factions' => [
                    'faction_Demacia_Name',
                    'faction_Freljord_Name',
                ],
                'game_outcome' => 'loss',
                'order_of_play' => 1,
            ],
        ];
        $object = LorPlayerDTOCollection::createFromArray($data);
        self::assertFalse($object->isEmpty());
        self::assertInstanceOf(LorPlayerDTO::class, $object->offsetGet(0));
    }

    public function testCreateFromArrayReturnsEmptyCollectionWhenNoData(): void
    {
        $data = [];
        $object = LorPlayerDTOCollection::createFromArray($data);
        self::assertTrue($object->isEmpty());
    }
}
