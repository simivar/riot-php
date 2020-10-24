<?php

declare(strict_types=1);

namespace Riot\Tests\Unit\DTO;

use PHPUnit\Framework\TestCase;
use Riot\DTO\LorPlayerDTO;

final class LorPlayerDTOTest extends TestCase
{
    public function testCreateFromArrayCreatesProperObject(): void
    {
        $data = [
            'puuid' => 'aaaa123f99qdPsswfrbER4CURy3iz6vkdrN1sF6-ApDMgsocqU9L1GEFNadd6yKr_uK_s7RPNZi_qg',
            'deck_id' => '1234564-cdec-44c6-b0a3-cb21853c1879',
            'deck_code' => 'AAAAAAYBAEDRMGREFYZDKCABAABQMCYSCQNB2JYCAQAQABYMFIWAMAIBBEKCAIRHFE',
            'factions' => [
                'faction_Demacia_Name',
                'faction_Freljord_Name',
            ],
            'game_outcome' => 'loss',
            'order_of_play' => 1,
        ];
        $object = LorPlayerDTO::createFromArray($data);
        self::assertSame(
            'aaaa123f99qdPsswfrbER4CURy3iz6vkdrN1sF6-ApDMgsocqU9L1GEFNadd6yKr_uK_s7RPNZi_qg',
            $object->getPuuid(),
        );
        self::assertSame('1234564-cdec-44c6-b0a3-cb21853c1879', $object->getDeckId());
        self::assertSame(
            'AAAAAAYBAEDRMGREFYZDKCABAABQMCYSCQNB2JYCAQAQABYMFIWAMAIBBEKCAIRHFE',
            $object->getDeckCode(),
        );
        self::assertIsArray($object->getFactions());
        self::assertArrayHasKey(0, $object->getFactions());
        self::assertSame('faction_Demacia_Name', $object->getFactions()[0]);
        self::assertSame('loss', $object->getGameOutcome());
        self::assertSame(1, $object->getOrderOfPlay());
    }
}
