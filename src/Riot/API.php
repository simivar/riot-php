<?php
declare(strict_types=1);

namespace Riot;

use Riot\API\Version4\Summoner;
use Riot\API\Version4\ThirdPartyCode;

final class API
{
    private Connection $riotConnection;

    private array $apis;

    public function __construct(Connection $riotConnection)
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
}