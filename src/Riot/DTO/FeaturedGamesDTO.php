<?php

declare(strict_types=1);

namespace Riot\DTO;

use Riot\Collection\FeaturedGameInfoDTOCollection;

final class FeaturedGamesDTO implements DTOInterface
{
    /** @var FeaturedGameInfoDTOCollection<FeaturedGameInfoDTO> */
    private FeaturedGameInfoDTOCollection $gameList;

    private int $clientRefreshInterval;

    /**
     * @param FeaturedGameInfoDTOCollection<FeaturedGameInfoDTO> $gameList
     */
    public function __construct(
        FeaturedGameInfoDTOCollection $gameList,
        int $clientRefreshInterval
    ) {
        $this->gameList = $gameList;
        $this->clientRefreshInterval = $clientRefreshInterval;
    }

    /**
     * @return FeaturedGameInfoDTOCollection<FeaturedGameInfoDTO>
     */
    public function getGameList(): FeaturedGameInfoDTOCollection
    {
        return $this->gameList;
    }

    public function getClientRefreshInterval(): int
    {
        return $this->clientRefreshInterval;
    }

    public static function createFromArray(array $data): self
    {
        return new self(
            FeaturedGameInfoDTOCollection::createFromArray($data['gameList']),
            $data['clientRefreshInterval'],
        );
    }
}
