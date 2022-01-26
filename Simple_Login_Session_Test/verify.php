<?php
session_start();

$user = $_POST['username'];
$pass = $_POST['password'];

if($user == "admin" && $pass == "admin"){
    $_SESSION['logged_in'] = "Yes";
    header("Location:home.php");
}
else{
    header("Location:index.php");
}
