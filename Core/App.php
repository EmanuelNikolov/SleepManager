<?php

namespace Core;


class App
{

    private const TEMPLATE_FOLDER = 'view';

    /*private const TEMPLATE_HEADER = '';

    private const TEMPLATE_FOOTER = '';*/

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
            header("Location: login.php");
            exit;
        }
    }
}