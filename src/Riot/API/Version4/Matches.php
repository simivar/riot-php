<?php

declare(strict_types=1);

namespace Riot\API\Version4;

use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Riot\API\AbstractApi;
use Riot\DTO\Lol\MatchDTO;
use Riot\DTO\Lol\MatchlistDTO;
use Riot\DTO\Lol\MatchTimelineDTO;
use Riot\Enum\RegionEnum;
use Riot\Exception as RiotException;
use Riot\Filter\MatchlistFilter;

final class Matches extends AbstractApi
{
    public function getByMatchId(int $matchId, RegionEnum $region): MatchDTO
    {
        return MatchDTO::createFromArray(
            $this->get($region, sprintf('lol/match/v4/matches/%s', $matchId))
        );
    }

    public function getMatchlistByAccountId(
        string $encryptedAccountId,
        RegionEnum $region,
        ?MatchlistFilter $filter = null
    ): MatchlistDTO {
        return MatchlistDTO::createFromArray($this->get(
            $region,
            sprintf(
                'lol/match/v4/matchlists/by-account/%s?%s',
                $encryptedAccountId,
                $filter ? $filter->getAsHttpQuery() : '',
            ),
        ));
    }

    public function getTimelineByMatchId(int $matchId, RegionEnum $region): MatchTimelineDTO
    {
        return MatchTimelineDTO::createFromArray(
            $this->get($region, sprintf('lol/match/v4/timelines/by-match/%s', $matchId))
        );
    }

    /**
     * @return array<int, int>
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
    public function getIdsByTournamentCode(string $tournamentCode, RegionEnum $region): array
    {
        return $this->get($region, sprintf('lol/match/v4/matches/by-tournament-code/%s/ids', $tournamentCode));
    }

    public function getByMatchIdAndTournamentCode(int $matchId, string $tournamentCode, RegionEnum $region): MatchDTO
    {
        return MatchDTO::createFromArray(
            $this->get($region, sprintf('lol/match/v4/matches/%s/by-tournament-code/%s', $matchId, $tournamentCode))
        );
    }
}
