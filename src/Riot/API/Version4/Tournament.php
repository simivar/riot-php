<?php

declare(strict_types=1);

namespace Riot\API\Version4;

use Riot\API\AbstractApi;
use Riot\DTO\LobbyEventDTOWrapperDTO;
use Riot\DTO\TournamentCodeDTO;
use Riot\Enum\GeoRegionEnum;
use Riot\Enum\MapTypeEnum;
use Riot\Enum\PickTypeEnum;
use Riot\Enum\SpectatorTypeEnum;
use Riot\Enum\TournamentRegionEnum;
use Webmozart\Assert\Assert;

final class Tournament extends AbstractApi
{
    /**
     * @param array<string> $allowedSummonerIds
     *
     * @return array<string>
     */
    public function createCode(
        int $tournamentId,
        int $count,
        array $allowedSummonerIds,
        int $teamSize,
        PickTypeEnum $pickType,
        MapTypeEnum $mapType,
        SpectatorTypeEnum $spectatorType,
        ?string $metadata
    ): array {
        Assert::isList($allowedSummonerIds);
        Assert::allString($allowedSummonerIds);
        Assert::range($teamSize, 1, 5);

        $response = $this->post(
            GeoRegionEnum::AMERICAS()->getValue(),
            sprintf('lol/tournament/v4/codes?count=%d&tournamentId=%d', $count, $tournamentId),
            [
                'allowedSummonerIds' => $allowedSummonerIds,
                'metadata' => $metadata,
                'teamSize' => $teamSize,
                'pickType' => $pickType->getValue(),
                'mapType' => $mapType->getValue(),
                'spectatorType' => $spectatorType->getValue(),
            ],
        );

        return $response->getBodyContentsDecodedAsArray();
    }

    /**
     * @param array<string> $allowedSummonerIds
     */
    public function updateCode(
        string $tournamentCode,
        array $allowedSummonerIds,
        PickTypeEnum $pickType,
        MapTypeEnum $mapType,
        SpectatorTypeEnum $spectatorType
    ): bool {
        Assert::isList($allowedSummonerIds);
        Assert::allString($allowedSummonerIds);

        $this->put(
            GeoRegionEnum::AMERICAS()->getValue(),
            sprintf('lol/tournament/v4/codes/%s', $tournamentCode),
            [
                'allowedSummonerIds' => $allowedSummonerIds,
                'pickType' => $pickType->getValue(),
                'mapType' => $mapType->getValue(),
                'spectatorType' => $spectatorType->getValue(),
            ],
        );

        return true;
    }

    public function getCodeByTournamentCode(string $tournamentCode): TournamentCodeDTO
    {
        return TournamentCodeDTO::createFromArray(
            $this->get(GeoRegionEnum::AMERICAS()->getValue(), sprintf('lol/tournament/v4/codes/%s', $tournamentCode))
        );
    }

    public function getLobbyEventsByTournamentCode(string $tournamentCode): LobbyEventDTOWrapperDTO
    {
        return LobbyEventDTOWrapperDTO::createFromArray($this->get(
            GeoRegionEnum::AMERICAS()->getValue(),
            sprintf('lol/tournament/v4/lobby-events/by-code/%s', $tournamentCode),
        ));
    }

    public function createProvider(TournamentRegionEnum $region, string $url): int
    {
        $response = $this->post(
            GeoRegionEnum::AMERICAS()->getValue(),
            'lol/tournament/v4/providers',
            [
                'region' => $region->getValue(),
                'url' => $url,
            ],
        );

        return $response->getBodyContentsDecodedAsInt();
    }

    public function createTournament(int $providerId, string $name): int
    {
        $response = $this->post(
            GeoRegionEnum::AMERICAS()->getValue(),
            'lol/tournament/v4/tournaments',
            [
                'providerId' => $providerId,
                'name' => $name,
            ],
        );

        return $response->getBodyContentsDecodedAsInt();
    }
}
