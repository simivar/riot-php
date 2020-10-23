<?php

declare(strict_types=1);

namespace Riot\API\Version3;

use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Riot\API\AbstractApi;
use Riot\DTO\ShardStatusDTO;
use Riot\Exception as RiotException;

final class LolStatus extends AbstractApi
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
    public function getShardData(string $region): ShardStatusDTO
    {
        $response = $this->riotConnection->get(
            $region,
            'lol/status/v3/shard-data',
        );

        return ShardStatusDTO::createFromArray($response->getBodyContentsDecodedAsArray());
    }
}
