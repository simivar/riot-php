<?php

declare(strict_types=1);

namespace Riot\Tests\Unit\DTO\Lor;

use PHPUnit\Framework\TestCase;
use Riot\DTO\Lor\MetadataDTO;

final class MetadataDTOTest extends TestCase
{
    public function testCreateFromArrayCreatesProperObject(): void
    {
        $data = [
            'data_version' => '2',
            'match_id' => '1234567d-42b7-41b7-a4cc-b29d1bb8ae96',
            'participants' => [
                'aaaa123f99qdPsswfrbER4CURy3iz6vkdrN1sF6-ApDMgsocqU9L1GEFNadd6yKr_uK_s7RPNZi_qg',
            ],
        ];
        $object = MetadataDTO::createFromArray($data);
        self::assertSame('2', $object->getDataVersion());
        self::assertSame('1234567d-42b7-41b7-a4cc-b29d1bb8ae96', $object->getMatchId());
        self::assertIsArray($object->getParticipants());
        self::assertArrayHasKey(0, $object->getParticipants());
        self::assertSame(
            'aaaa123f99qdPsswfrbER4CURy3iz6vkdrN1sF6-ApDMgsocqU9L1GEFNadd6yKr_uK_s7RPNZi_qg',
            $object->getParticipants()[0],
        );
    }
}
