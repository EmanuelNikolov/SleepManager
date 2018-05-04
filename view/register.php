<?php /** @var \DTO\User\UserRegisterViewData $viewData */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="view/bootstrap.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <title>Register</title>
</head>
<body>
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
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
                <li class="nav-item active">
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
                    <?php if ($viewData->getError()): ?>
                        <h2 id="forms"><?= htmlspecialchars($viewData->getError()); ?></h2>
                    <?php endif; ?>
                    <h2 id="forms">Register</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="bs-component">
                    <form method="post">
                        <fieldset>
                            <div class="form-group">
                                <label for="inputEmail">Email
                                    address</label>
                                <input class="form-control"
                                       id="inputEmail"
                                       aria-describedby="emailHelp"
                                       placeholder="Enter email" type="email"
                                       name="email">
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input class="form-control" id="username"
                                       placeholder="Enter username" type="text"
                                       name="username">
                            </div>
                            <div class="form-group">
                                <label for="dateInput">Birthday</label>
                                <input class="form-control" type="date"
                                       value="<?= date('Y-m-d'); ?>"
                                       id="dateInput" name="birthday">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input class="form-control" id="password"
                                       placeholder="Password" type="password"
                                       name="password">
                            </div>
                            <div class="form-group">
                                <label for="passwordConfirm">Confirm
                                    Password</label>
                                <input class="form-control" id="passwordConfirm"
                                       placeholder="Confirm Password"
                                       type="password" name="passwordConfirm">
                            </div>
                        </fieldset>
                        <button type="submit" class="btn btn-primary"
                                name="submit">Register
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>