<?php

namespace Services\Encryption;


interface PasswordEncryptionInterface
{

    public function encrypt(string $password): string;

    public function isValid(string $password, string $hash): bool;
}