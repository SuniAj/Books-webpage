<?php 
include "header.php";
if(!isset($_SESSION)){
    session_start();
}
if(!$user->checkloginstatus()){
    $user->redirect("index.php");
}

?>
