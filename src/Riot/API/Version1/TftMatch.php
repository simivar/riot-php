<?php

declare(strict_types=1);

namespace Riot\API\Version1;

use Riot\API\AbstractApi;
use Riot\DTO\Tft\MatchDTO;
use Riot\Enum\GeoRegionEnum;

final class TftMatch extends AbstractApi
{
    /**
     * @return array<string>
     *
     * @throws \JsonException
     * @throws \Psr\Http\Client\ClientExceptionInterface
     * @throws \Riot\Exception\BadGatewayException
     * @throws \Riot\Exception\BadRequestException
     * @throws \Riot\Exception\DataNotFoundException
     * @throws \Riot\Exception\ForbiddenException
     * @throws \Riot\Exception\GatewayTimeoutException
     * @throws \Riot\Exception\InternalServerErrorException
     * @throws \Riot\Exception\MethodNotAllowedException
     * @throws \Riot\Exception\RateLimitExceededException
     * @throws \Riot\Exception\ServiceUnavailableException
     * @throws \Riot\Exception\UnauthorizedException
     * @throws \Riot\Exception\UnsupportedMediaTypeException
     */
    public function getByPuuid(string $puuid, GeoRegionEnum $geoRegion, int $count = 20): array
    {
        $response = $this->riotConnection->get(
            $geoRegion->getValue(),
            sprintf('tft/match/v1/matches/by-puuid/%s/ids?count=%d', $puuid, $count)
        );

        return $response->getBodyContentsDecodedAsArray();
    }

    public function getById(string $matchId, GeoRegionEnum $geoRegion): MatchDTO
    {
        $response = $this->riotConnection->get(
            $geoRegion->getValue(),
            sprintf('tft/match/v1/matches/%s', $matchId),
        );

        return MatchDTO::createFromArray($response->getBodyContentsDecodedAsArray());
    }
}
