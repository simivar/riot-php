<?php

declare(strict_types=1);

namespace Riot\API\Version3;

use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Riot\API\AbstractApi;
use Riot\DTO\ShardStatusDTO;
use Riot\Enum\RegionEnum;
use Riot\Exception as RiotException;

/**
 * @deprecated Version3 is deprecated since Dec 11th, 2020 and will be removed in 60 days. Use Version4 instead.
 * @see \Riot\API\Version4\LolStatus
 */
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
     *
     * @deprecated Version3 is deprecated since Dec 11th, 2020 and will be removed in 60 days. Use Version4 instead.
     */
    public function getShardData(RegionEnum $region): ShardStatusDTO
    {
        $response = $this->riotConnection->get(
            $region->getValue(),
            'lol/status/v3/shard-data',
        );

        return ShardStatusDTO::createFromArray($response->getBodyContentsDecodedAsArray());
    }
}
