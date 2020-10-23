<?php

declare(strict_types=1);

namespace Riot\API\Version1;

use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Riot\API\AbstractApi;
use Riot\DTO\AccountDTO;
use Riot\DTO\ActiveShardDTO;
use Riot\Exception as RiotException;

final class Account extends AbstractApi
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
    public function getByPuuid(string $puuid, string $geoRegion): AccountDTO
    {
        $response = $this->riotConnection->get(
            $geoRegion,
            sprintf('riot/account/v1/accounts/by-puuid/%s', $puuid),
        );
        $body = $response->getBody()->getContents();

        return AccountDTO::createFromArray(json_decode($body, true, 512, JSON_THROW_ON_ERROR));
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
    public function getByGameNameAndTagLine(string $gameName, string $tagLine, string $geoRegion): AccountDTO
    {
        $response = $this->riotConnection->get(
            $geoRegion,
            sprintf('riot/account/v1/accounts/by-riot-id/%s/%s', $gameName, $tagLine),
        );
        $body = $response->getBody()->getContents();

        return AccountDTO::createFromArray(json_decode($body, true, 512, JSON_THROW_ON_ERROR));
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
    public function getByGameAndPuuid(string $game, string $puuid, string $geoRegion): ActiveShardDTO
    {
        $response = $this->riotConnection->get(
            $geoRegion,
            sprintf('riot/account/v1/active-shards/by-game/%s/by-puuid/%s', $game, $puuid),
        );
        $body = $response->getBody()->getContents();

        return ActiveShardDTO::createFromArray(json_decode($body, true, 512, JSON_THROW_ON_ERROR));
    }
}
