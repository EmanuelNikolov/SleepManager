<?php
require "app.php";
$app->checkLogin();

$sleepLogService = new \Services\SleepLog\SleepLogService($db);
$viewData = $sleepLogService->showLogs($_SESSION['user_id']);

$app->render("all_logs", $viewData);