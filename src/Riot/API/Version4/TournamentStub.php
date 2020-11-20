<?php

declare(strict_types=1);

namespace Riot\API\Version4;

use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Riot\API\AbstractApi;
use Riot\DTO\LobbyEventDTOWrapperDTO;
use Riot\Enum\GeoRegionEnum;
use Riot\Enum\MapTypeEnum;
use Riot\Enum\PickTypeEnum;
use Riot\Enum\SpectatorTypeEnum;
use Riot\Enum\TournamentRegionEnum;
use Riot\Exception as RiotException;
use Webmozart\Assert\Assert;

final class TournamentStub extends AbstractApi
{
    /**
     * @param array<string> $allowedSummonerIds
     *
     * @return array<string>
     *
     * @throws JsonException
     * @throws RiotException\BadGatewayException
     * @throws RiotException\BadRequestException
     * @throws RiotException\DataNotFoundException
     * @throws RiotException\ForbiddenException
     * @throws RiotException\GatewayTimeoutException
     * @throws RiotException\InternalServerErrorException
     * @throws RiotException\MethodNotAllowedException
     * @throws RiotException\RateLimitExceededException
     * @throws RiotException\ServiceUnavailableException
     * @throws RiotException\UnauthorizedException
     * @throws RiotException\UnsupportedMediaTypeException
     * @throws ClientExceptionInterface
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

        $response = $this->riotConnection->post(
            GeoRegionEnum::AMERICAS()->getValue(),
            sprintf('lol/tournament-stub/v4/codes?count=%d&tournamentId=%d', $count, $tournamentId),
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
     * @throws JsonException
     * @throws RiotException\BadGatewayException
     * @throws RiotException\BadRequestException
     * @throws RiotException\DataNotFoundException
     * @throws RiotException\ForbiddenException
     * @throws RiotException\GatewayTimeoutException
     * @throws RiotException\InternalServerErrorException
     * @throws RiotException\MethodNotAllowedException
     * @throws RiotException\RateLimitExceededException
     * @throws RiotException\ServiceUnavailableException
     * @throws RiotException\UnauthorizedException
     * @throws RiotException\UnsupportedMediaTypeException
     * @throws ClientExceptionInterface
     */
    public function getLobbyEventsByTournamentCode(string $tournamentCode): LobbyEventDTOWrapperDTO
    {
        $response = $this->riotConnection->get(
            GeoRegionEnum::AMERICAS()->getValue(),
            sprintf('lol/tournament-stub/v4/lobby-events/by-code/%s', $tournamentCode),
        );

        return LobbyEventDTOWrapperDTO::createFromArray($response->getBodyContentsDecodedAsArray());
    }

    /**
     * @throws JsonException
     * @throws RiotException\BadGatewayException
     * @throws RiotException\BadRequestException
     * @throws RiotException\DataNotFoundException
     * @throws RiotException\ForbiddenException
     * @throws RiotException\GatewayTimeoutException
     * @throws RiotException\InternalServerErrorException
     * @throws RiotException\MethodNotAllowedException
     * @throws RiotException\RateLimitExceededException
     * @throws RiotException\ServiceUnavailableException
     * @throws RiotException\UnauthorizedException
     * @throws RiotException\UnsupportedMediaTypeException
     * @throws ClientExceptionInterface
     */
    public function createProvider(TournamentRegionEnum $region, string $url): int
    {
        $response = $this->riotConnection->post(
            GeoRegionEnum::AMERICAS()->getValue(),
            'lol/tournament-stub/v4/providers',
            [
                'region' => $region->getValue(),
                'url' => $url,
            ],
        );

        return $response->getBodyContentsDecodedAsInt();
    }

    /**
     * @throws JsonException
     * @throws RiotException\BadGatewayException
     * @throws RiotException\BadRequestException
     * @throws RiotException\DataNotFoundException
     * @throws RiotException\ForbiddenException
     * @throws RiotException\GatewayTimeoutException
     * @throws RiotException\InternalServerErrorException
     * @throws RiotException\MethodNotAllowedException
     * @throws RiotException\RateLimitExceededException
     * @throws RiotException\ServiceUnavailableException
     * @throws RiotException\UnauthorizedException
     * @throws RiotException\UnsupportedMediaTypeException
     * @throws ClientExceptionInterface
     */
    public function createTournament(int $providerId, string $name): int
    {
        $response = $this->riotConnection->post(
            GeoRegionEnum::AMERICAS()->getValue(),
            'lol/tournament-stub/v4/tournaments',
            [
                'providerId' => $providerId,
                'name' => $name,
            ],
        );

        return $response->getBodyContentsDecodedAsInt();
    }
}
