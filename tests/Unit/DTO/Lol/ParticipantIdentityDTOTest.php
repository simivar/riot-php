<?php

declare(strict_types=1);

namespace Riot\Tests\Unit\DTO\Lol;

use PHPUnit\Framework\TestCase;
use Riot\DTO\Lol\ParticipantIdentityDTO;
use Riot\DTO\Lol\PlayerDTO;

final class ParticipantIdentityDTOTest extends TestCase
{
    public function testCreateFromArrayCreatesProperObject(): void
    {
        $data = [
            'participantId' => 1,
            'player' => [
                'platformId' => 'EUN1',
                'accountId' => 'account-id',
                'summonerName' => 'Player One',
                'summonerId' => 'summoner-id',
                'currentPlatformId' => 'EUN1',
                'currentAccountId' => 'current-account-id',
                'matchHistoryUri' => '/v1/stats/player_history/EUN1/1',
                'profileIcon' => 4787,
            ],
        ];
        $object = ParticipantIdentityDTO::createFromArray($data);
        self::assertSame(1, $object->getParticipantId());
        self::assertInstanceOf(PlayerDTO::class, $object->getPlayer());
    }
}
