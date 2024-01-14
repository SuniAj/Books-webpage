<?php
include "Includes/class.user.php";
include "Includes/config.php";

if (isset($_POST['logout'])) {
    if ($user->Logout()) {
        $user->redirect("index.php");
    }
}

// Start the session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LoggingSystem</title>
    <!-- Link to local Bootstrap CSS file -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Your custom stylesheet -->
    <link rel="stylesheet" href="css/stylesheet.css">
    <script src="https://kit.fontawesome.com/a1b10b23f2.js" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-dark py-4">
    <div class="container-fluid">
        <a class="navbar-brand text-light" href="home.php">LoggingSystem</a>
        <div class="headerdiv">
            <?php
            if (!$user->checkloginstatus()) {
                ?>
                <a class="btn btn-light text-right" href="index.php">Login</a>
                <a class="btn btn-light text-right" href="register.php">Register</a>
                <?php
            }
            if ($user->checkloginstatus()) {
                ?>
                <a class="btn btn-light" href="account.php">Account</a>
                <?php
                if ($user->checkuserole(20)) {
                    echo "<a href='admin.php' class='m-1 btn btn-danger'>Admin Page</a>";
                }
                ?>
                <form method='post' class="">
                    <input type="submit" class="m-1 btn btn-light text-right" id="button3" name="logout"
                           value="Logout"><br>
                </form>
                <?php
            }
            ?>
        </div>
    </div>
</nav>

<!-- Your page content goes here -->

<!-- Include Bootstrap JS if needed -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
