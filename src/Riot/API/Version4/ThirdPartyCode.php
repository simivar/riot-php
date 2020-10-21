<?php

declare(strict_types=1);

namespace Riot\API\Version4;

use Riot\API\AbstractApi;
use Riot\Exception\RateLimitExceededException;

final class ThirdPartyCode extends AbstractApi
{
    /**
     * @throws RateLimitExceededException
     * @throws \JsonException
     */
    public function getBySummonerId(string $encryptedSummonerId, string $region): ?string
    {
        $response = $this->riotConnection->get(
            $region,
            sprintf('lol/platform/v4/third-party-code/by-summoner/%s', $encryptedSummonerId),
        );

        if (null === $response) {
            return null;
        }

        $body = $response->getBody()->getContents();

        return json_decode($body, true, 512, JSON_THROW_ON_ERROR);
    }
}
