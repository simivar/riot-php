<?php

declare(strict_types=1);

namespace Riot\API;

use Riot\AbstractAPIFactory;
use Riot\API\Version1\Account;
use Riot\API\Version1\Clash;
use Riot\API\Version1\LorMatch;
use Riot\API\Version1\LorRanked;
use Riot\API\Version1\TftLeague;
use Riot\API\Version1\TftMatch;
use Riot\API\Version1\TftSummoner;
use Riot\API\Version1\ValContent;
use Riot\Exception\InvalidApiEndpointException;

final class Version1 extends AbstractAPIFactory
{
    private const ACCOUNT = 'account';
    private const LOR_RANKED = 'lor_ranked';
    private const LOR_MATCH = 'lor_match';
    private const CLASH = 'clash';
    private const TFT_SUMMONER = 'tft_summoner';
    private const TFT_LEAGUE = 'tft_league';
    private const TFT_MATCH = 'tft_match';
    private const VAL_CONTENT = 'val_content';

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

    public function getTftSummoner(): TftSummoner
    {
        /** @var TftSummoner $api */
        $api = $this->createApi(self::TFT_SUMMONER);

        return $api;
    }

    public function getTftLeague(): TftLeague
    {
        /** @var TftLeague $api */
        $api = $this->createApi(self::TFT_LEAGUE);

        return $api;
    }

    public function getTftMatch(): TftMatch
    {
        /** @var TftMatch $api */
        $api = $this->createApi(self::TFT_MATCH);

        return $api;
    }

    public function getValContent(): ValContent
    {
        /** @var ValContent $api */
        $api = $this->createApi(self::VAL_CONTENT);

        return $api;
    }

    /**
     * @return Account|LorRanked|LorMatch|Clash|TftSummoner|TftLeague|TftMatch|ValContent
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
            case self::TFT_SUMMONER:
                return new TftSummoner($this->connection);
            case self::TFT_LEAGUE:
                return new TftLeague($this->connection);
            case self::TFT_MATCH:
                return new TftMatch($this->connection);
            case self::VAL_CONTENT:
                return new ValContent($this->connection);
            default:
                throw new InvalidApiEndpointException();
        }
    }
}
