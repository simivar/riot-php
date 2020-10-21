<?php

declare(strict_types=1);

namespace Riot\API\Version4;

use function json_decode;
use Riot\API\AbstractApi;
use Riot\DTO\SummonerDTO;
use Riot\Exception\RateLimitExceededException;

final class Summoner extends AbstractApi
{
    /**
     * @throws RateLimitExceededException
     * @throws \JsonException
     */
    public function getByName(string $summonerName, string $region): ?SummonerDTO
    {
        $response = $this->riotConnection->get(
            $region,
            sprintf('lol/summoner/v4/summoners/by-name/%s', $summonerName),
        );

        if (null === $response) {
            return null;
        }

        $body = $response->getBody()->getContents();

        return SummonerDTO::createFromArray(json_decode($body, true, 512, JSON_THROW_ON_ERROR));
    }
}
