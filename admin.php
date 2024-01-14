<?php 
include "header.php";


if($user->checkloginstatus()){
    if(!$user->checkuserole(20)){
        $user->redirect('home.php');
    }
}
else{
    $user->redirect("index.php");
}

if(isset($_POST['search'])){
    $userlist = $user->searchuser();
    
}




?>



<h1 class="text-center m-1">Search For User</h1>
<div class="d-flex justify-content-center">
    <form method='post' class="d-flex">
        <input class="form-control me-2" type="search" name="search_user" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit" name="search">Search</button>
    </form>
</div>

<div class="d-flex justify-content-center m-5">
    <?php
    if(isset($userlist)){
        foreach($userlist as $row){
            echo "<p class='m-3'>{$row['u_username']} <a class='m-1 btn btn-dark' href='account.php?usertoedit={$row['u_ID']}'> Edit User </a></p>";
        }
    }
    else {

        echo "User not found!";
    
    }
    ?>
</div>