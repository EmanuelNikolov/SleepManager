<?php

namespace Exceptions;


class RegisterException extends \Exception implements RedirectExceptions
{

    public function redirect()
    {
        header("Location: register.php");
        exit;
    }
}