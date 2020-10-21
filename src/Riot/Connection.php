<?php
declare(strict_types=1);

namespace Riot;

use Psr\Http\Message\RequestFactoryInterface;
use Riot\Exception\RateLimitExceededException;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\ResponseInterface;

final class Connection
{
    private const API_URL = 'api.riotgames.com';

    private const STATUS_CODE_LIMIT_EXCEEDED = 429;
    private const STATUS_CODE_OK = 200;

    private ClientInterface $client;

    private string $riotApiToken;

    private RequestFactoryInterface $requestFactory;

    public function __construct(ClientInterface $riotClient, string $riotApiToken, RequestFactoryInterface $requestFactory)
    {
        $this->client = $riotClient;
        $this->riotApiToken = $riotApiToken;
        $this->requestFactory = $requestFactory;
    }

    public function get(string $region, string $path): ?ResponseInterface
    {
        $request = $this->requestFactory->createRequest(
            'GET',
            sprintf('https://%s.%s/%s', $region, self::API_URL, $path),
        );
        $request = $request->withAddedHeader('X-Riot-Token', $this->riotApiToken);

        $response = $this->client->sendRequest($request);
        if ($response->getStatusCode() === self::STATUS_CODE_LIMIT_EXCEEDED) {
            throw RateLimitExceededException::createFromResponse($response);
        }

        // todo throw exception?
        if ($response->getStatusCode() !== self::STATUS_CODE_OK) {
            return null;
        }

        return $response;
    }
}