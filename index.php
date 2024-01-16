<?php 
include "header.php";

if(!isset($_SESSION)){
    session_start();
}
if(isset($_POST['login'])){

    $checklogin = $user->login();

    if($checklogin == "success"){

        $user->redirect("home.php");
    
    }
    //If something does not meet the requirements, echo out what went wrong.
    else {
        echo "<p class='text-white bg-danger text-center'>{$checklogin}</p>";
    }
}


?>




<div class="index">
    <form method="post" action="">
        <label for="username">Username/Email</label><br>
        <input type="text" name="username_email" placeholder="Username/Email"><br>

        <label for="password">Password</label><br>
        <input type="password" name="password" placeholder="Password"><br>

        <a herf="" class="mb-3">Forgot Password?</a><br>

        <input type="submit" class="m-3" id="button1" name="login" value="Login"><br>

    </form>
</div>