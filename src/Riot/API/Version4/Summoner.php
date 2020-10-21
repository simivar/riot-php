<?php

declare(strict_types=1);

namespace Riot\API\Version4;

use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Riot\Exception as RiotException;
use function json_decode;
use Riot\API\AbstractApi;
use Riot\DTO\SummonerDTO;

final class Summoner extends AbstractApi
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
    public function getByName(string $summonerName, string $region): SummonerDTO
    {
        $response = $this->riotConnection->get(
            $region,
            sprintf('lol/summoner/v4/summoners/by-name/%s', $summonerName),
        );

        $body = $response->getBody()->getContents();
        return SummonerDTO::createFromArray(json_decode($body, true, 512, JSON_THROW_ON_ERROR));
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
    public function getByAccountId(string $encryptedAccountId, string $region): SummonerDTO
    {
        $response = $this->riotConnection->get(
            $region,
            sprintf('lol/summoner/v4/summoners/by-account/%s', $encryptedAccountId),
        );

        $body = $response->getBody()->getContents();
        return SummonerDTO::createFromArray(json_decode($body, true, 512, JSON_THROW_ON_ERROR));
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
    public function getByPuuid(string $encryptedPuuid, string $region): SummonerDTO
    {
        $response = $this->riotConnection->get(
            $region,
            sprintf('lol/summoner/v4/summoners/by-puuid/%s', $encryptedPuuid),
        );

        $body = $response->getBody()->getContents();
        return SummonerDTO::createFromArray(json_decode($body, true, 512, JSON_THROW_ON_ERROR));
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
    public function getById(string $id, string $region): SummonerDTO
    {
        $response = $this->riotConnection->get(
            $region,
            sprintf('lol/summoner/v4/summoners/%s', $id),
        );

        $body = $response->getBody()->getContents();
        return SummonerDTO::createFromArray(json_decode($body, true, 512, JSON_THROW_ON_ERROR));
    }
}
