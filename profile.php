<?php
require "app.php";
$app->checkLogin();

if (isset($_POST['submit'])) {
    $sleepTime = new DateTime($_POST['sleepTime']);
    $wakeTime = new DateTime($_POST['wakeTime']);
    var_dump($sleepTime, $wakeTime);
}

$userService = new \Services\User\UserService($db, $encryptionService);
$user = $userService->getUser($_SESSION['user_id']);

$viewData = new \DTO\User\UserProfileViewData($user);

$app->render("profile", $viewData);