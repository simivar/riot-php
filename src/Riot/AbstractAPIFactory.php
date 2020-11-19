<?php

declare(strict_types=1);

namespace Riot;

use Riot\API\AbstractApi;

abstract class AbstractAPIFactory
{
    protected ConnectionInterface $connection;

    /** @var array<AbstractApi> */
    protected array $registeredApis;

    public function __construct(ConnectionInterface $connection)
    {
        $this->connection = $connection;
    }

    protected function createApi(string $key): AbstractApi
    {
        if (isset($this->registeredApis[$key])) {
            return $this->registeredApis[$key];
        }

        $this->registeredApis[$key] = $this->createApiMap($key);

        return $this->registeredApis[$key];
    }

    abstract protected function createApiMap(string $key): AbstractApi;
}
