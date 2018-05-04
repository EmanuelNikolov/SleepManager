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
    );

    public function login(string $userCredential, string $password): string;
}