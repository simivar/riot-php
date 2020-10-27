<?php

declare(strict_types=1);

namespace Riot;

use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Riot\API\ResponseDecoderInterface;
use Riot\Exception as RiotException;

interface ConnectionInterface
{
    public const STATUS_CODE_BAD_REQUEST = 400;
    public const STATUS_CODE_UNAUTHORIZED = 401;
    public const STATUS_CODE_OK = 200;
    public const STATUS_CODE_FORBIDDEN = 403;
    public const STATUS_CODE_DATA_NOT_FOUND = 404;
    public const STATUS_CODE_METHOD_NOT_ALLOWED = 405;
    public const STATUS_CODE_UNSUPPORTED_MEDIA_TYPE = 415;
    public const STATUS_CODE_LIMIT_EXCEEDED = 429;
    public const STATUS_CODE_INTERNAL_SERVER_ERROR = 500;
    public const STATUS_CODE_BAD_GATEWAY = 502;
    public const STATUS_CODE_SERVICE_UNAVAILABLE = 503;
    public const STATUS_CODE_GATEWAY_TIMEOUT = 504;

    /**
     * @throws JsonException
     * @throws RiotException\BadGatewayException
     * @throws RiotException\BadRequestException
     * @throws RiotException\DataNotFoundException
     * @throws RiotException\ForbiddenException
     * @throws RiotException\GatewayTimeoutException
     * @throws RiotException\InternalServerErrorException
     * @throws RiotException\MethodNotAllowedException
     * @throws RiotException\RateLimitExceededException
     * @throws RiotException\ServiceUnavailableException
     * @throws RiotException\UnauthorizedException
     * @throws RiotException\UnsupportedMediaTypeException
     * @throws ClientExceptionInterface
     */
    public function get(string $region, string $path): ResponseDecoderInterface;

    /**
     * @param array<mixed> $data
     *
     * @throws JsonException
     * @throws RiotException\BadGatewayException
     * @throws RiotException\BadRequestException
     * @throws RiotException\DataNotFoundException
     * @throws RiotException\ForbiddenException
     * @throws RiotException\GatewayTimeoutException
     * @throws RiotException\InternalServerErrorException
     * @throws RiotException\MethodNotAllowedException
     * @throws RiotException\RateLimitExceededException
     * @throws RiotException\ServiceUnavailableException
     * @throws RiotException\UnauthorizedException
     * @throws RiotException\UnsupportedMediaTypeException
     * @throws ClientExceptionInterface
     */
    public function post(string $region, string $path, array $data): ResponseDecoderInterface;

    /**
     * @param array<mixed> $data
     *
     * @throws JsonException
     * @throws RiotException\BadGatewayException
     * @throws RiotException\BadRequestException
     * @throws RiotException\DataNotFoundException
     * @throws RiotException\ForbiddenException
     * @throws RiotException\GatewayTimeoutException
     * @throws RiotException\InternalServerErrorException
     * @throws RiotException\MethodNotAllowedException
     * @throws RiotException\RateLimitExceededException
     * @throws RiotException\ServiceUnavailableException
     * @throws RiotException\UnauthorizedException
     * @throws RiotException\UnsupportedMediaTypeException
     * @throws ClientExceptionInterface
     */
    public function put(string $region, string $path, array $data): ResponseDecoderInterface;
}
