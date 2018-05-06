<?php
require "app.php";
$app->checkLogin();

if (isset($_POST['submit'])) {
    $sleepLogService = new \Services\SleepLog\SleepLogService($db);
    try {
        $sleepTime = new DateTime("{$_POST['sleepDate']} {$_POST['sleepTime']}");
        $wakeTime = new DateTime("{$_POST['wakeDate']} {$_POST['wakeTime']}");
    } catch (Exception $e) {
        throw new \Exceptions\LogCycleException("Invalid Date or Time", 0, $e);
    }

    $sleepLogService->logCycle(
      $sleepTime,
      $wakeTime,
      $_SESSION['user_id'],
      $_POST['dreamRecord']
    );

    header("Location: all_logs.php");
    exit;
}

if (isset($_SESSION['error'])) {
    $viewData = new \DTO\SleepLog\SleepLogViewData(new DateTime(),
      $_SESSION['error']);
    unset($_SESSION['error']);
} else {
    $viewData = new \DTO\SleepLog\SleepLogViewData(new DateTime());
}

$app->render("log_cycle", $viewData);