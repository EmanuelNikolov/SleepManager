<?php

namespace Exceptions;


class LoginException extends \Exception implements RedirectExceptions
{

    public function redirect()
    {
        header("Location: login.php");
        exit;
    }
}