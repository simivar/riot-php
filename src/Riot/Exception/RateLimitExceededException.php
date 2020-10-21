<?php
declare(strict_types=1);

namespace Riot\Exception;

use Psr\Http\Message\ResponseInterface;

final class RateLimitExceededException extends RiotApiException
{
    private int $retryAfter;

    private string $rateLimitType;
    private string $appRateLimit;
    private string $appRateLimitCount;
    private string $methodRateLimit;
    private string $methodRateLimitCount;

    public function __construct(
        string $message,
        int $retryAfter,
        string $rateLimitType,
        string $appRateLimit,
        string $appRateLimitCount,
        string $methodRateLimit,
        string $methodRateLimitCount
    )
    {
        parent::__construct($message);
        $this->retryAfter = $retryAfter;
        $this->rateLimitType = $rateLimitType;
        $this->appRateLimit = $appRateLimit;
        $this->appRateLimitCount = $appRateLimitCount;
        $this->methodRateLimit = $methodRateLimit;
        $this->methodRateLimitCount = $methodRateLimitCount;
    }

    public function getRetryAfter(): int
    {
        return $this->retryAfter;
    }

    public function getRateLimitType(): string
    {
        return $this->rateLimitType;
    }

    public function getAppRateLimit(): string
    {
        return $this->appRateLimit;
    }

    public function getAppRateLimitCount(): string
    {
        return $this->appRateLimitCount;
    }

    public function getMethodRateLimit(): string
    {
        return $this->methodRateLimit;
    }

    public function getMethodRateLimitCount(): string
    {
        return $this->methodRateLimitCount;
    }

    public static function createFromResponse(ResponseInterface $response): self
    {
        return new self(
            'Rate limit exceeded',
            (int) $response->getHeader('retry-after')[0],
            $response->getHeader('x-rate-limit-type')[0],
            $response->getHeader('x-app-rate-limit')[0],
            $response->getHeader('x-app-rate-limit-count')[0],
            $response->getHeader('x-method-rate-limit')[0],
            $response->getHeader('x-method-rate-limit-count')[0],
        );
    }
}
