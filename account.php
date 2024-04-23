<?php 
include "header.php";

if(!$user->checkloginstatus()){
    $user->redirect('index.php');

}

if($user->checkuserole(20) && isset($_GET['usertoedit'])){
    $usertoedit = $_GET['usertoedit'];
}

else{
    $usertoedit = $_SESSION['user_id'];
}

if(isset($_POST['updatinginfo'])){

    $checkreturn = $user->CheckUserRegisterInput();
    //If all checks are passed 
    if($checkreturn == "success"){
        if($user->edituserinfo($usertoedit)){
            $feedback = "user info updated successfully";
        }
    }
    else {
        $feedback =$checkreturn;
    }
}

$feedback = '';

if (isset($_POST['updatinguserinfo'])) {
    if ($_POST['editrole'] != 0) {
        $yorole = $user->updateuserrole($usertoedit);
        if ($yorole == "success") {
            $feedback .= "User role updated successfullyyyy";
        } else {
            $feedback .= $yorole;  // Append to $feedback instead of overwriting
        }
    } else {
        $feedback .= "Please choose a valid role.";  // Provide a message if the selected role is 0
    }
} else {
    if (!empty($feedback)) {
        echo '<div class="feedback-section">' . $feedback . '</div>';
    }
}


$userinfo = $user->getuserinfo($usertoedit);

$roleinfo = $conn->query("SELECT * FROM table_roles");



?>

<div class="feedback-section">
<?php
if(isset($feedback)){
    echo $feedback;
}
?>
</div>



<div class="account">
    <form method="post" action="">
        <h2>Change Account info</h2>
        <label for="username">Username</label><br>
        <input type="text" name="username" value="<?php echo $userinfo['u_username'];?>" disabled><br>

        <label for="email">E-mail</label><br>
        <input type="text" name="email" value="<?php echo $userinfo['u_email'];?>" ><br>

        <label for="password">Enter Old Password</label><br>
        <input type="text" name="oldpassword" placeholder="Enter Old Password"><br>

        <label for="newpass">New Password</label><br>
        <input type="text" name="password" placeholder="New Password"><br>

        <label for="conpass">Confirm New Password</label><br>
        <input type="text" name="conpass" placeholder="Confirm New Password"><br>

        <input type="submit" class="m-2" id="button" name="updatinginfo" value="Update Info">
    </form>

    <?php 
        if($user->checkuserole(20)){
            
        
    ?>
    <form method="post" action="">

        <label for="editrole">Edit Role:</label><br>
                
            <select name="editrole" id="editrole">
            <option value="0">Choose Role</option>
                <?php 
                foreach($roleinfo as $row){
                    echo "<option value='{$row['r_ID']}'>{$row['r_name']}</option><br> ";
                }
                ?>
            </select>
            <br />
        <br><input type="submit" class="m-1" id="button" name="updatinguserinfo" value="Update Info">
    </form>
    <?php 
    }
    ?>
    <form method="post" action="confirm_delete.php?usertoedit=<?php echo $usertoedit; ?>">
        <input type="submit" class="m-1" id="button" name="delete_user" value="Delete Account">
    </form>
</div>

<?php
//include "footer.php";
?>