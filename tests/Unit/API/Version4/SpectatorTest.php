<?php

declare(strict_types=1);

namespace Tests\Riot\Unit\API\Version4;

use Riot\API\Version4\Spectator;
use Riot\Collection\FeaturedGameInfoDTOCollection;
use Riot\Tests\APITestCase;

final class SpectatorTest extends APITestCase
{
    public function testGetFeaturedGamesReturnsProperObjectOnSuccess(): void
    {
        $object = new Spectator($this->createConnectionMock(
            'lol/spectator/v4/featured-games',
            '{"gameList":[],"clientRefreshInterval":300}',
        ));
        $result = $object->getFeaturedGames('eun1');
        self::assertSame(300, $result->getClientRefreshInterval());
        self::assertInstanceOf(FeaturedGameInfoDTOCollection::class, $result->getGameList());
    }
}
