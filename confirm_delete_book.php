<?php 
include "header.php";

if(!$user->checkloginstatus()){
    $user->redirect("index.php");
}



if(isset($_GET['booktodelete'])){
    
    $booktodelete = $_GET['booktodelete'];
}
else{
    $errorMessage = "no book has been chosen";
}


if(isset($_POST['confirm_delete_book'])){
    $deletebook = deleteBook($conn, $booktodelete);

    if($booktodelete == "success"){
        $feedback = "book successfully deleted";
    }
    else{
        $errorMessage = $deletebook;
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
    if(isset($_POST['delete_book']) && isset($booktodelete)){
        ?>
        <h1>Are You Sure U Want To Delete This book</h1>
        <form method="post" action="">
            <input type="submit" name="confirm_delete_book" value="DELETE This Book">
        </form>


        <?php
    }
    else{
        echo "nothing to delete, back to <a href='index.php'>Home</a>";
    }
    ?>

</div>
