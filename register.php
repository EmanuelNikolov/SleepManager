<?php
require "app.php";
$userService = new \Services\User\UserService($db, $encryptionService);

if (isset($_POST['submit'])) {

    $userService->register(
      $_POST['email'],
      $_POST['username'],
      $_POST['password'],
      $_POST['passwordConfirm'],
      $_POST['birthday']
    );

    header("Location: login.php");
    exit;
}

if (isset($_SESSION['error'])) {
    $viewData = new \DTO\User\UserRegisterViewData($_SESSION['error']);
    unset($_SESSION['error']);
} else {
    $viewData = new \DTO\User\UserRegisterViewData();
}

$app->render("register", $viewData);