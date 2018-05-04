<?php

namespace DTO\User;


class User
{

    private $id;

    private $email;

    private $username;

    private $passwordHash;

    private $birthday;

    public function getId(): string
    {
        return $this->id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getPasswordHash(): string
    {
        return $this->passwordHash;
    }

    public function getBirthday(): string
    {
        return $this->birthday;
    }
}