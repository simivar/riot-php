<?php

declare(strict_types=1);

namespace Riot\API\Version4;

use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Riot\API\AbstractApi;
use Riot\Collection\ChampionMasteryDTOCollection;
use Riot\DTO\ChampionMasteryDTO;
use Riot\Enum\RegionEnum;
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
    public function getBySummonerId(string $encryptedSummonerId, RegionEnum $region): ChampionMasteryDTOCollection
    {
        $championMasteries = $this->get(
            $region, sprintf('lol/champion-mastery/v4/champion-masteries/by-summoner/%s', $encryptedSummonerId)
        );

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
        RegionEnum $region
    ): ChampionMasteryDTO {
        return ChampionMasteryDTO::createFromArray($this->get(
            $region,
            sprintf(
                'lol/champion-mastery/v4/champion-masteries/by-summoner/%s/by-champion/%s',
                $encryptedSummonerId,
                $championId,
            ),
        ));
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
    public function getScoreBySummonerId(string $encryptedSummonerId, RegionEnum $region): int
    {
        return $this->getInt($region, sprintf('lol/champion-mastery/v4/scores/by-summoner/%s', $encryptedSummonerId));
    }
}
