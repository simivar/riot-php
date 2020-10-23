<?php

declare(strict_types=1);

namespace Riot\API\Version1;

use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Riot\API\AbstractApi;
use Riot\DTO\LeaderboardDTO;
use Riot\Exception as RiotException;

final class LorRanked extends AbstractApi
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
    public function getLeaderboards(string $geoRegion): LeaderboardDTO
    {
        $response = $this->riotConnection->getAsDecodedArray(
            $geoRegion,
            'lor/ranked/v1/leaderboards',
        );

        return LeaderboardDTO::createFromArray($response);
    }
}
