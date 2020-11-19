<?php

declare(strict_types=1);

namespace Riot\API;

use Riot\AbstractAPIFactory;
use Riot\API\Version3\Champion;
use Riot\API\Version3\LolStatus;
use Riot\Exception\InvalidApiEndpointException;

final class Version3 extends AbstractAPIFactory
{
    private const CHAMPION = 'champion';
    private const LOL_STATUS = 'lol_status';

    public function getChampion(): Champion
    {
        /** @var Champion $api */
        $api = $this->createApi(self::CHAMPION);

        return $api;
    }

    public function getLolStatus(): LolStatus
    {
        /** @var LolStatus $api */
        $api = $this->createApi(self::LOL_STATUS);

        return $api;
    }

    /**
     * @return Champion|LolStatus
     */
    protected function createApiMap(string $key): AbstractApi
    {
        switch ($key) {
            case self::CHAMPION:
                return new Champion($this->connection);
            case self::LOL_STATUS:
                return new LolStatus($this->connection);
            default:
                throw new InvalidApiEndpointException();
        }
    }
}
