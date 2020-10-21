<?php

declare(strict_types=1);

namespace Riot\API\Version4;

use Psr\Http\Client\ClientExceptionInterface;
use Riot\API\AbstractApi;
use Riot\Exception as RiotException;
use JsonException;

final class ThirdPartyCode extends AbstractApi
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
    public function getBySummonerId(string $encryptedSummonerId, string $region): string
    {
        $response = $this->riotConnection->get(
            $region,
            sprintf('lol/platform/v4/third-party-code/by-summoner/%s', $encryptedSummonerId),
        );

        $body = $response->getBody()->getContents();
        return json_decode($body, true, 512, JSON_THROW_ON_ERROR);
    }
}
