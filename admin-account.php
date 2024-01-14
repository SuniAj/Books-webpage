<?php 
include "header.php";




?>


<div>
    <form method="post" action="">
        <label for="username">Username</label><br>
        <input type="text" name="username" placeholder="Username"><br>

        <label for="email">E-mail</label><br>
        <input type="text" name="email" placeholder="Email"><br>

        <label for="password">Enter Old Password</label><br>
        <input type="text" name="password" placeholder="Password"><br>

        <label for="newpass">New Password</label><br>
        <input type="text" name="newpass" placeholder="New Password"><br>

        <label for="connewpass">Confirm New Password</label><br>
        <input type="text" name="connewpass" placeholder="Confirm New Password"><br>

        <label for="cars">User Role :</label>
            <select name="cars" id="cars">
                <option value="User">User</option>
                <option value="Editor">Editor</option>
                <option value="Admin">Admin</option>
                <option value="Adminstor">Adminstor</option>
            </select><br>

        <label for="cars">User Role :</label>
            <select name="cars" id="cars">
                <option value="Active">Active</option>
                <option value="Suspended">Suspended</option>
            </select><br>

        <input type="submit" id="button" name="return" value="Return"><br>

        <input type="submit" id="button" name="updatinginfo" value="Update Info">

        <input type="submit" id="button" name="return" value="Return"><br>
    </form>
</div>