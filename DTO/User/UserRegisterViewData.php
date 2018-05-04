<?php

namespace DTO\User;


class UserRegisterViewData
{

    private $error;

    public function __construct($error = null)
    {
        $this->error = $error;
    }

    public function getError()
    {
        return $this->error;
    }
}