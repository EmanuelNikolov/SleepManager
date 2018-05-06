<?php /** @var \DTO\SleepLog\LogsViewData $viewData */
/** \DTO\SleepLog\Log $log */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="view/bootstrap.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <title>Login</title>
</head>
<body class="" style="">
<div class="navbar navbar-expand-lg fixed-top navbar-dark bg-primary" style="">
    <div class="container">
        <a class="navbar-brand" href="index.php">SleepCalculator</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarColor01"
                aria-controls="navbarColor01" aria-expanded="false"
                aria-label="Toggle navigation" style="">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home<span
                                class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="register.php">Register</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="container">
    <div class="bs-docs-section">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header">
                    <h2 id="forms">All Logs</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="bs-component">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Went to bed at</th>
                            <th scope="col">Got up at</th>
                            <th scope="col">Time Asleep</th>
                            <th scope="col">Dream Notes</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($viewData->getLogs() as $log): ?>
                            <tr class="table-active">
                                <th scope="row"><?= $log->getId(); ?></th>
                                <td><?= $log->getStart(); ?></td>
                                <td><?= $log->getEnd(); ?></td>
                                <td><?= $log->getTimeAsleep(); ?></td>
                                <td style=""><?= $log->getDreamRecord(); ?></td>
                            </tr>
                        <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>