<?php

declare(strict_types=1);

namespace Riot\API\Version4;

use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Riot\API\AbstractApi;
use Riot\DTO\FeaturedGamesDTO;
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
    public function getFeaturedGames(string $region): FeaturedGamesDTO
    {
        $response = $this->riotConnection->get(
            $region,
            'lol/spectator/v4/featured-games',
        );

        $body = $response->getBody()->getContents();

        return FeaturedGamesDTO::createFromArray(json_decode($body, true, 512, JSON_THROW_ON_ERROR));
    }
}
