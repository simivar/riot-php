<?php

declare(strict_types=1);

namespace Riot;

use Riot\API\Version1\Account;
use Riot\API\Version4\Summoner;
use Riot\API\Version4\ThirdPartyCode;

final class API
{
    private ConnectionInterface $riotConnection;

    /** @var array<string, mixed> */
    private array $apis;

    public function __construct(ConnectionInterface $riotConnection)
    {
        $this->riotConnection = $riotConnection;
    }

    public function getSummonerV4Api(): Summoner
    {
        if (!isset($this->apis['summonerV4'])) {
            $this->apis['summonerV4'] = new Summoner($this->riotConnection);
        }

        return $this->apis['summonerV4'];
    }

    public function getThirdPartyCodeV4Api(): ThirdPartyCode
    {
        if (!isset($this->apis['thirdPartyCodeV4'])) {
            $this->apis['thirdPartyCodeV4'] = new ThirdPartyCode($this->riotConnection);
        }

        return $this->apis['thirdPartyCodeV4'];
    }

    public function getAccountV1Api(): Account
    {
        if (!isset($this->apis['accountV1'])) {
            $this->apis['accountV1'] = new Account($this->riotConnection);
        }

        return $this->apis['accountV1'];
    }
}
