<?php

namespace Services\User;


class UserService implements UserServiceInterface
{

    public function register(
      $email,
      $username,
      $password,
      $passwordConfirm,
      $birthday
    ): bool {
        // TODO: Implement register() method.
    }

    public function login($userCredential, $password): bool
    {
        // TODO: Implement login() method.
    }
}