<?php
require "app.php";
$app->checkLogin();

$userService = new \Services\User\UserService($db, $encryptionService);
$user = $userService->getUser($_SESSION['user_id']);

$viewData = new \DTO\User\UserProfileViewData($user);

$app->render("profile", $viewData);