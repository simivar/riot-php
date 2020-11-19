<?php

declare(strict_types=1);

namespace Riot\Exception;

final class InvalidApiVersionException extends RiotApiException
{
    public function __construct(string $message = '')
    {
        parent::__construct($message, '');
    }
}
