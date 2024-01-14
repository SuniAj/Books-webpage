<?php 
include "header.php";

if(!$user->checkloginstatus()){
    $user->redirect("index.php");
}



if(isset($_GET['usertoedit'])){
    
    $usertoedit = $_GET['usertoedit'];
}
else{
    $errorMessage = "no user has been chosen";
}


if(isset($_POST['confirm_delete_account'])){
    $deleteacc = $user->Deleteaccount($usertoedit);

    if($usertoedit == "success"){
        $feedback = "acc successfully deleted";
    }
    else{
        $errorMessage = $deleteacc;
    }
}

  //  echo "<p class='text-center'>Welcome {$_SESSION['user_id']}</p>";

?>
<div class="error-section">
    <?php
         if(isset($errorMessage)){
            echo $errorMessage;
        }
    ?>

</div>
<div class='content-inner'>
    <?php
    if(isset($feedback)){
        echo $feedback;
    }
    if(isset($_POST['delete_user']) && isset($usertoedit)){
        ?>
        <h1>Are You Sure U Want To Delete This Account</h1>
        <form method="post" action="">
            <input type="submit" name="confirm_delete_account" value="DELETE This ACCOUNT">
        </form>


        <?php
    }
    else{
        echo "nothing to delete, back to <a href='home.php'>Home</a>";
    }
    ?>

</div>
