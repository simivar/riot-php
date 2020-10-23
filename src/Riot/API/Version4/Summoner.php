<?php

declare(strict_types=1);

namespace Riot\API\Version4;

use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Riot\API\AbstractApi;
use Riot\DTO\SummonerDTO;
use Riot\Exception as RiotException;

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
        $response = $this->riotConnection->getAsDecodedArray(
            $region,
            sprintf('lol/summoner/v4/summoners/by-name/%s', $summonerName),
        );

        return SummonerDTO::createFromArray($response);
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
        $response = $this->riotConnection->getAsDecodedArray(
            $region,
            sprintf('lol/summoner/v4/summoners/by-account/%s', $encryptedAccountId),
        );

        return SummonerDTO::createFromArray($response);
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
        $response = $this->riotConnection->getAsDecodedArray(
            $region,
            sprintf('lol/summoner/v4/summoners/by-puuid/%s', $encryptedPuuid),
        );

        return SummonerDTO::createFromArray($response);
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
        $response = $this->riotConnection->getAsDecodedArray(
            $region,
            sprintf('lol/summoner/v4/summoners/%s', $id),
        );

        return SummonerDTO::createFromArray($response);
    }
}
