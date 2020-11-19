<?php

declare(strict_types=1);

namespace Riot\Exception;

final class InvalidApiEndpointException extends RiotApiException
{
    public function __construct(string $message = '')
    {
        parent::__construct($message, '');
    }
}
