<?php

declare(strict_types=1);

namespace Riot\API\Version3;

use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Riot\API\AbstractApi;
use Riot\DTO\ChampionInfoDTO;
use Riot\Exception as RiotException;

final class Champion extends AbstractApi
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
    public function getChampionRotations(string $region): ChampionInfoDTO
    {
        $response = $this->riotConnection->get(
            $region,
            'lol/platform/v3/champion-rotations',
        );

        return ChampionInfoDTO::createFromArray($response->getBodyContentsDecodedAsArray());
    }
}
