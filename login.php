<?php
require "app.php";
$userService = new \Services\User\UserService($db, $encryptionService);

if (isset($_POST['submit'])) {
    $userCredential = $_POST['userCredential'];
    $password = $_POST['password'];

    $_SESSION['user_id'] = $userService->login($userCredential, $password);

    header("Location: profile.php");
    exit;
}

$app->render("login");