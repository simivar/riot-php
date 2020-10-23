<?php

declare(strict_types=1);

namespace Riot\API;

use Psr\Http\Message\ResponseInterface;

interface ResponseDecoderInterface
{
    public function __construct(ResponseInterface $response);

    public function getResponse(): ResponseInterface;

    /**
     * @return array<mixed>
     */
    public function getBodyContentsDecodedAsArray(): array;
}
