<?php
require "app.php";
$app->checkLogin();


$app->render("all_logs");