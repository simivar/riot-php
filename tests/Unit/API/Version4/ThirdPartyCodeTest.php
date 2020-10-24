<?php

declare(strict_types=1);

namespace Riot\Tests\Unit\API\Version4;

use Riot\API\Version4\ThirdPartyCode;
use Riot\Enum\RegionEnum;
use Riot\Tests\APITestCase;

final class ThirdPartyCodeTest extends APITestCase
{
    public function testGetBySummonerIdReturnsStringOnSuccess(): void
    {
        $thirdPartyCode = new ThirdPartyCode($this->createStringConnectionMock(
            'lol/platform/v4/third-party-code/by-summoner/simivar',
            'test',
            'eun1',
        ));
        $result = $thirdPartyCode->getBySummonerId('simivar', RegionEnum::EUN1());
        self::assertSame('test', $result);
    }
}
