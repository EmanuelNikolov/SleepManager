<?php

namespace Core;


use Exceptions\LoginException;

class App
{

    private const TEMPLATE_FOLDER = 'view';

    public const LOGIN_ERROR_MSG = 'You have to be logged in to do that.';

    public function render(string $templateName, $viewData = null): void
    {
        require self::TEMPLATE_FOLDER
          . DIRECTORY_SEPARATOR
          . $templateName
          . '.php';

    }

    public function checkLogin()
    {
        if (!isset($_SESSION['user_id'])) {
            throw new LoginException(self::LOGIN_ERROR_MSG);
        }
    }
}