<?php

declare(strict_types=1);

namespace Riot\API\Version1;

use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Riot\API\AbstractApi;
use Riot\DTO\MatchDTO;
use Riot\Enum\GeoRegionEnum;
use Riot\Exception as RiotException;

final class LorMatch extends AbstractApi
{
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
     *
     * @return array<string>
     */
    public function getIdsByPuuid(string $puuid, GeoRegionEnum $geoRegion): array
    {
        $response = $this->riotConnection->get(
            $geoRegion->__toString(),
            sprintf('lor/match/v1/matches/by-puuid/%s/ids', $puuid),
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
    public function getById(string $matchId, GeoRegionEnum $geoRegion): MatchDTO
    {
        $response = $this->riotConnection->get(
            $geoRegion->__toString(),
            sprintf('lor/match/v1/matches/%s', $matchId),
        );

        return MatchDTO::createFromArray($response->getBodyContentsDecodedAsArray());
    }
}
