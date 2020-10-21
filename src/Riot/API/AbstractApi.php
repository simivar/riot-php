<?php

declare(strict_types=1);

namespace Riot\API;

use Riot\ConnectionInterface;

abstract class AbstractApi
{
    protected ConnectionInterface $riotConnection;

    public function __construct(ConnectionInterface $riotConnection)
    {
        $this->riotConnection = $riotConnection;
    }
}
