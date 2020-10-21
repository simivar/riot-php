<?php
declare(strict_types=1);

namespace Riot\API\Version4;

use Riot\API\AbstractApi;
use Riot\DTO\SummonerDTO;
use Riot\Exception\RateLimitExceededException;
use function json_decode;

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

        if ($response === null) {
            return null;
        }

        $body = $response->getBody()->getContents();
        return SummonerDTO::createFromArray(json_decode($body, true, 512, JSON_THROW_ON_ERROR));
    }
}
