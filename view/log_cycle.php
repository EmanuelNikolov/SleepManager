<?php /** @var \DTO\User\UserProfileViewData $viewData */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="view/bootstrap.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <title>Profile</title>
</head>
<body>
<div class="navbar navbar-expand-lg fixed-top navbar-dark bg-primary" style="">
    <div class="container">
        <a class="navbar-brand" href="../index.php">SleepCalculator</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarColor01"
                aria-controls="navbarColor01" aria-expanded="false"
                aria-label="Toggle navigation" style="">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../index.php">Home<span
                                class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="users.php">Users</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="../profile.php">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="profile_edit.php">Edit profile</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" method="post"
                  action="../index.php">
                <button class="btn btn-secondary my-2 my-sm-0" type="submit"
                        name="logout">
                    Logout
                </button>
            </form>
        </div>
    </div>
</div>
<div class="container">
    <div class="bs-docs-section">
        <form method="post">
            <div class="row text-center">
                <div class="form-group col-lg-6 mx-auto">
                    <label for="sleepTime">
                        When did you go to bed?
                    </label>
                    <input class="form-control" id="sleepTime"
                           type="datetime-local"
                           name="sleepTime">
                </div>
                <div class="form-group col-lg-6 mx-auto">
                    <label for="wakeTime">When did you wake
                        up?</label>
                    <input class="form-control" id="wakeTime"
                           type="datetime-local"
                           name="wakeTime">
                </div>
                <button type="submit" class="btn btn-primary mx-auto"
                        name="submit">Submit
                </button>
            </div>
        </form>
    </div>
</div>
</body>
</html>