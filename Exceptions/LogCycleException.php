<?php

namespace Exceptions;


class LogCycleException extends \Exception implements RedirectExceptions
{


    public function redirect()
    {
        header("Location: log_cycle.php");
        exit;
    }
}