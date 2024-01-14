<?php 
include "header.php";
echo "siu";
//checks if form have been sent 
if(isset($_POST['register'])){
    //Function returns success or error message that is saved in $checking
    $checking = $user->CheckUserRegisterInput();
    
    //If all checks are passsed, run register-function
    if($checking == "success"){

        $reg = $user->register(); 

    echo "<p class='text-white bg-success text-center'>Great Success!!! <a href='index.php'>Log in</a> </p>";

    'window.location.href = "home.php"';
    }
    //If something does not meet the requirements, echo out what went wrong.
    else {
        echo "<p class='text-white bg-danger text-center'>{$checking}</p>";
    }

}


?>

<div class="register">
    <form method="post" action="">
        <label for="username">Username</label><br>
        <input type="text" name="username" placeholder="Username"><br>

        <label for="email">E-mail</label><br>
        <input type="text" name="email" placeholder="Email"><br>

        <label for="password">Password</label><br>
        <input type="password" name="password" placeholder="Password"><br>

        <label for="conpass">Confirm Password</label><br>
        <input type="password" name="conpass" placeholder="Confirm Password"><br>

        <input type="submit" class="m-2" id="button" name="register" value="Register"><br>

        <span>User Already?</span>&nbsp;<a type="submit" href="index.php" class="mb-3">Log in!</a><br>

    </form>
</div>

<?php 
include "footer.php";
?>