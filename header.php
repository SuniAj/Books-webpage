<?php
include "Includes/class.user.php";
include "Includes/config.php";
include "functions.php";

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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="css/stylesheet.css">
    <script src="https://kit.fontawesome.com/a1b10b23f2.js" crossorigin="anonymous"></script>
    <script src="javascript/script.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-black py-4">
    <div class="container d-flex">
        <a class="navbar-brand text-light" href="index.php">Books Webpage</a>
        <div class="headerdiv text-center">
            <div class="d-flex">
                <a class="btn btn-dark" id="headerlables" href="index.php">Home</a>
                <a class="btn btn-dark" id="headerlables" href="Books.php">Books</a>
                <a class="btn btn-dark" id="headerlables" href="aboutus.php">About us</a>
                <a class="btn btn-dark" id="headerlables" href="contactus.php">Contact us</a>
            </div>
            
            <?php
            if ($user->checkloginstatus()) {
                ?>
                <div id="rightheaderting" class="d-flex">
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
                </div>
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
