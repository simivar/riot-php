<?php

declare(strict_types=1);

namespace Riot\API;

use Riot\AbstractAPIFactory;
use Riot\API\Version1\Account;
use Riot\API\Version1\Clash;
use Riot\API\Version1\LorMatch;
use Riot\API\Version1\LorRanked;
use Riot\Exception\InvalidApiEndpointException;

final class Version1 extends AbstractAPIFactory
{
    private const ACCOUNT = 'account';
    private const LOR_RANKED = 'lor_ranked';
    private const LOR_MATCH = 'lor_match';
    private const CLASH = 'clash';

    public function getAccount(): Account
    {
        /** @var Account $api */
        $api = $this->createApi(self::ACCOUNT);
        return $api;
    }

    public function getLorRanked(): LorRanked
    {
        /** @var LorRanked $api */
        $api = $this->createApi(self::LOR_RANKED);
        return $api;
    }

    public function getLorMatch(): LorMatch
    {
        /** @var LorMatch $api */
        $api = $this->createApi(self::LOR_MATCH);
        return $api;
    }

    public function getClash(): Clash
    {
        /** @var Clash $api */
        $api = $this->createApi(self::CLASH);
        return $api;
    }

    /**
     * @return Account|LorRanked|LorMatch|Clash
     */
    protected function createApiMap(string $key): AbstractApi
    {
        switch ($key) {
            case self::ACCOUNT:
                return new Account($this->connection);
            case self::LOR_RANKED:
                return new LorRanked($this->connection);
            case self::LOR_MATCH:
                return new LorMatch($this->connection);
            case self::CLASH:
                return new Clash($this->connection);
            default:
                throw new InvalidApiEndpointException();
        }
    }
}
