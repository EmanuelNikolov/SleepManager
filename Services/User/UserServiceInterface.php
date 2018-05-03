<?php

namespace Services\User;


interface UserServiceInterface
{

    public function register(
      string $email,
      string $username,
      string $password,
      string $passwordConfirm,
      string $birthday
    ): bool;

    public function login($userCredential, $password): bool;
}