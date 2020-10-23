<?php

declare(strict_types=1);

namespace Riot\API;

use Psr\Http\Message\ResponseInterface;

final class ResponseDecoder implements ResponseDecoderInterface
{
    private ResponseInterface $response;

    public function __construct(ResponseInterface $response)
    {
        $this->response = $response;
    }

    public function getResponse(): ResponseInterface
    {
        return $this->response;
    }

    /**
     * @return array<mixed>
     *
     * @throws \JsonException
     */
    public function getBodyContentsDecodedAsArray(): array
    {
        $body = $this->response->getBody()->getContents();

        return json_decode($body, true, 512, JSON_THROW_ON_ERROR);
    }
}
