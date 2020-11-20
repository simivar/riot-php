<?php

declare(strict_types=1);

namespace Riot\Tests\Unit\DTO\Val;

use PHPUnit\Framework\TestCase;
use Riot\DTO\Val\LocalizedNamesDTO;

final class LocalizedINamesDTOTest extends TestCase
{
    public function testCreateFromArrayCreatesProperObject(): void
    {
        $data = [
            'ar-AE' => 'رايز',
                'de-DE' => 'Raze',
                'en-GB' => 'Raze',
                'en-US' => 'Raze',
                'es-ES' => 'Raze',
                'es-MX' => 'Raze',
                'fr-FR' => 'Raze',
                'id-ID' => 'Raze',
                'it-IT' => 'Raze',
                'ja-JP' => 'レイズ',
                'ko-KR' => '레이즈',
                'pl-PL' => 'Raze',
                'pt-BR' => 'Raze',
                'ru-RU' => 'Raze',
                'th-TH' => 'Raze',
                'tr-TR' => 'RAZE',
                'vi-VN' => 'Raze',
                'zh-CN' => '雷兹',
                'zh-TW' => '芮茲',
        ];
        $object = LocalizedNamesDTO::createFromArray($data);
        self::assertSame('رايز', $object->getArAe());
        self::assertSame('Raze', $object->getDeDe());
        self::assertSame('Raze', $object->getEnGb());
        self::assertSame('Raze', $object->getEnUs());
        self::assertSame('Raze', $object->getEsEs());
        self::assertSame('Raze', $object->getEsMx());
        self::assertSame('Raze', $object->getFrFr());
        self::assertSame('Raze', $object->getIdId());
        self::assertSame('Raze', $object->getItIt());
        self::assertSame('レイズ', $object->getJaJp());
        self::assertSame('레이즈', $object->getKoKr());
        self::assertSame('Raze', $object->getPlPl());
        self::assertSame('Raze', $object->getPtBr());
        self::assertSame('Raze', $object->getRuRu());
        self::assertSame('Raze', $object->getThTh());
        self::assertSame('RAZE', $object->getTrTr());
        self::assertSame('Raze', $object->getViVn());
        self::assertSame('雷兹', $object->getZhCn());
        self::assertSame('芮茲', $object->getZhTw());
    }
}
