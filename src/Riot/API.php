<?php

declare(strict_types=1);

namespace Riot;

use Riot\API\Version1;
use Riot\API\Version3;
use Riot\API\Version4;
use Riot\Exception\InvalidApiVersionException;

final class API
{
    private const VERSION_1 = 'version1';
    private const VERSION_3 = 'version3';
    private const VERSION_4 = 'version4';

    private ConnectionInterface $connection;

    /** @var array<string, AbstractAPIFactory> */
    private array $factories;

    public function __construct(ConnectionInterface $connection)
    {
        $this->connection = $connection;
    }

    public function getVersion1(): Version1
    {
        /** @var Version1 $factory */
        $factory = $this->createFactory(self::VERSION_1);

        return $factory;
    }

    public function getVersion3(): Version3
    {
        /** @var Version3 $factory */
        $factory = $this->createFactory(self::VERSION_3);

        return $factory;
    }

    public function getVersion4(): Version4
    {
        /** @var Version4 $factory */
        $factory = $this->createFactory(self::VERSION_4);

        return $factory;
    }

    /**
     * @return AbstractAPIFactory|Version1|Version3|Version4
     */
    private function createFactory(string $key): AbstractAPIFactory
    {
        if (isset($this->factories[$key])) {
            return $this->factories[$key];
        }

        switch ($key) {
            case self::VERSION_1:
                $api = new Version1($this->connection);
                break;
            case self::VERSION_3:
                $api = new Version3($this->connection);
                break;
            case self::VERSION_4:
                $api = new Version4($this->connection);
                break;
            default:
                throw new InvalidApiVersionException();
        }

        $this->factories[$key] = $api;

        return $this->factories[$key];
    }
}
