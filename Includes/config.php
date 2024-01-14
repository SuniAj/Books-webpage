<?php
$servername = "localhost";
$username = "root";
$password = "";


try {

$conn = new PDO ("mysql:host=$servername;dbname=bok_ab", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
//echo "Connected Successfully";

}
catch(PDOException $e) {
    echo "Connection Failed: ". $e->getmessage();

}

if(!isset($_SESSION)){
    session_start();
}

   $user = new USER($conn);


?>