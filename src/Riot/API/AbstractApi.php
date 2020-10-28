<?php

declare(strict_types=1);

namespace Riot\API;

use Riot\ConnectionInterface;
use Riot\Enum\GeoRegionEnum;
use Riot\Enum\RegionEnum;

abstract class AbstractApi
{
    private ConnectionInterface $riotConnection;

    public function __construct(ConnectionInterface $riotConnection)
    {
        $this->riotConnection = $riotConnection;
    }

    /**
     * @param string|RegionEnum|GeoRegionEnum $region
     * @param string $path
     * @return ResponseDecoderInterface
     */
    private function getData($unionRegion, string $path)
    {
        $region = $unionRegion;
        if ($unionRegion instanceof RegionEnum) {
            $region = $unionRegion->getValue();
        } elseif ($region instanceof GeoRegionEnum) {
            $region = $unionRegion->__toString();
        }
        return $this->riotConnection->get($region, $path);
    }

    public function post(string $region, string $path, array $data): ResponseDecoderInterface
    {
        return $this->riotConnection->post($region, $path, $data);
    }
    public function put(string $region, string $path, array $data): ResponseDecoderInterface
    {
        return $this->riotConnection->put($region, $path, $data);
    }

    /**
     * @param string|RegionEnum|GeoRegionEnum $region
     * @param string $path
     * @return array
     */
    protected function get($region, string $path): array
    {
        return $this->getData($region, $path)->getBodyContentsDecodedAsArray();
    }

    /**
     * @param string|RegionEnum|GeoRegionEnum $region
     * @param string $path
     * @return int
     */
    protected function getInt($region, string $path): int
    {
        return $this->getData($region, $path)->getBodyContentsDecodedAsInt();
    }

    /**
     * @param string|RegionEnum|GeoRegionEnum $region
     * @param string $path
     * @return int
     */
    protected function getString($region, string $path): string
    {
        return $this->getData($region, $path)->getBodyContentsDecodedAsString();
    }
}
