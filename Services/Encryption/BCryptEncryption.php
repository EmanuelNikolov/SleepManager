<?php

namespace Services\Encryption;


class BCryptEncryption implements PasswordEncryptionInterface
{

    public function encrypt(string $password): string
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    public function isValid(string $password, string $hash): bool
    {
        return password_verify($password, $hash);
    }
}