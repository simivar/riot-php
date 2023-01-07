<?php

declare(strict_types=1);

namespace Riot\API\Version5;

use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Riot\API\AbstractApi;
use Riot\DTO\Lol\MatchDTO;
use Riot\DTO\Lol\MatchlistDTO;
use Riot\DTO\Lol\MatchTimelineDTO;
use Riot\Enum\RegionEnum;
use Riot\Exception as RiotException;
use Riot\Filter\MatchlistFilter;

final class Match_ extends AbstractApi
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
     */
    public function getByMatchId(int $matchId, RegionEnum $region): MatchDTO
    {
        $response = $this->riotConnection->get(
            $region->getValue(),
            sprintf('lol/match/v5/matches/%s', $matchId),
        );

        return MatchDTO::createFromArray($response->getBodyContentsDecodedAsArray());
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
    public function getMatchlistByPuuid(
        string $puuid,
        RegionEnum $region,
        ?MatchlistFilter $filter = null
    ): MatchlistDTO {
        $response = $this->riotConnection->get(
            $region->getValue(),
            sprintf(
                'lol/match/v5/matches/by-puuid/%s/ids?%s',
                $puuid,
                $filter ? $filter->getAsHttpQuery() : '',
            ),
        );

        return MatchlistDTO::createFromArray($response->getBodyContentsDecodedAsArray());
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
    public function getTimelineByMatchId(int $matchId, RegionEnum $region): MatchTimelineDTO
    {
        $response = $this->riotConnection->get(
            $region->getValue(),
            sprintf('lol/match/v5/matches/%s/timeline', $matchId),
        );

        return MatchTimelineDTO::createFromArray($response->getBodyContentsDecodedAsArray());
    }


}
