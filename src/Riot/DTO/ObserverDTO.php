<?php

declare(strict_types=1);

namespace Riot\DTO;

final class ObserverDTO implements DTOInterface
{
    private string $encryptionKey;

    public function __construct(string $encryptionKey)
    {
        $this->encryptionKey = $encryptionKey;
    }

    public function getEncryptionKey(): string
    {
        return $this->encryptionKey;
    }

    public static function createFromArray(array $data): self
    {
        return new self(
            $data['encryptionKey'],
        );
    }
}
