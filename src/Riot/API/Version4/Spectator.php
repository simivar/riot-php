<?php

declare(strict_types=1);

namespace Riot\API\Version4;

use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Riot\API\AbstractApi;
use Riot\DTO\CurrentGameInfoDTO;
use Riot\DTO\FeaturedGamesDTO;
use Riot\Enum\RegionEnum;
use Riot\Exception as RiotException;

final class Spectator extends AbstractApi
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
    public function getActiveGamesBySummonerId(string $encryptedSummonerId, RegionEnum $region): CurrentGameInfoDTO
    {
        $response = $this->riotConnection->get(
            $region->getValue(),
            sprintf('lol/spectator/v4/active-games/by-summoner/%s', $encryptedSummonerId),
        );

        return CurrentGameInfoDTO::createFromArray($response->getBodyContentsDecodedAsArray());
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
    public function getFeaturedGames(RegionEnum $region): FeaturedGamesDTO
    {
        $response = $this->riotConnection->get(
            $region->getValue(),
            'lol/spectator/v4/featured-games',
        );

        return FeaturedGamesDTO::createFromArray($response->getBodyContentsDecodedAsArray());
    }
}
