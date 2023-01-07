<?php

declare(strict_types=1);

namespace Riot\API;

use Riot\AbstractAPIFactory;
use Riot\API\Version5\Match_;
use Riot\Exception\InvalidApiEndpointException;

final class Version5 extends AbstractAPIFactory
{
    private const MATCH_ = 'match';

    public function getMatch(): Match_
    {
        /** @var Match_ $api */
        $api = $this->createApi(self::MATCH_);

        return $api;
    }

    protected function createApiMap(string $key): AbstractApi
    {
        switch ($key) {
            case self::MATCH_:
                return new Match_($this->connection);
            default:
                throw new InvalidApiEndpointException();
        }
    }
}
