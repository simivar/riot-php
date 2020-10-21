<?php

declare(strict_types=1);

namespace Riot\Exception;

use Exception;
use Psr\Http\Message\ResponseInterface;

class RiotApiException extends Exception
{
    private string $edgeTraceId;

    public function __construct(string $message, string $edgeTraceId)
    {
        parent::__construct($message);
        $this->edgeTraceId = $edgeTraceId;
    }

    public static function createFromResponse(string $message, ResponseInterface $response): self
    {
        return new static(
            $message,
            $response->getHeader('x-riot-edge-trace-id')[0],
        );
    }

    public function getEdgeTraceId(): string
    {
        return $this->edgeTraceId;
    }
}
