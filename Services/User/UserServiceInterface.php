<?php

namespace Services\User;


interface UserServiceInterface
{

    public function register(
      $email,
      $username,
      $password,
      $passwordConfirm,
      $birthday
    ): bool;

    public function login($userCredential, $password): bool;
}