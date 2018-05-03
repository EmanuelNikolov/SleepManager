<?php
require "app.php";
$userService = new \Services\User\UserService($db, $encryptionService);

if (isset($_POST['submit'])) {

    $result = $userService->register(
      $_POST['email'],
      $_POST['username'],
      $_POST['password'],
      $_POST['passwordConfirm'],
      $_POST['birthday']
    );

    if (!$result) {
        throw new Exception("Something went wrong :(");
    }

    header("Location: profile.php");
    exit;
}

$app->render("register");