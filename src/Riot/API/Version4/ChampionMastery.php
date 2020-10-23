<?php

declare(strict_types=1);

namespace Riot\API\Version4;

use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Riot\API\AbstractApi;
use Riot\Collection\ChampionMasteryDTOCollection;
use Riot\DTO\ChampionMasteryDTO;
use Riot\Exception as RiotException;

final class ChampionMastery extends AbstractApi
{
    /**
     * @return ChampionMasteryDTOCollection<ChampionMasteryDTO>
     *
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
    public function getBySummonerId(string $encryptedSummonerId, string $region): ChampionMasteryDTOCollection
    {
        $response = $this->riotConnection->get(
            $region,
            sprintf('lol/champion-mastery/v4/champion-masteries/by-summoner/%s', $encryptedSummonerId),
        );

        $body = $response->getBody()->getContents();
        $championMasteries = json_decode($body, true, 512, JSON_THROW_ON_ERROR);
        $collection = new ChampionMasteryDTOCollection();
        foreach ($championMasteries as $championMastery) {
            $collection->add(ChampionMasteryDTO::createFromArray($championMastery));
        }

        return $collection;
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
    public function getBySummonerIdAndChampionId(
        string $encryptedSummonerId,
        int $championId,
        string $region
    ): ChampionMasteryDTO {
        $response = $this->riotConnection->get(
            $region,
            sprintf(
                'lol/champion-mastery/v4/champion-masteries/by-summoner/%s/by-champion/%s',
                $encryptedSummonerId,
                $championId,
            ),
        );

        $body = $response->getBody()->getContents();

        return ChampionMasteryDTO::createFromArray(json_decode($body, true, 512, JSON_THROW_ON_ERROR));
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
    public function getScoreBySummonerId(string $encryptedSummonerId, string $region): int
    {
        $response = $this->riotConnection->get(
            $region,
            sprintf(
                'lol/champion-mastery/v4/scores/by-summoner/%s',
                $encryptedSummonerId,
            ),
        );

        $body = $response->getBody()->getContents();

        return json_decode($body, true, 512, JSON_THROW_ON_ERROR);
    }
}
