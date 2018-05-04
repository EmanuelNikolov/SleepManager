<?php

namespace Exceptions;


interface RedirectExceptions extends \Throwable
{

    public function redirect();
}