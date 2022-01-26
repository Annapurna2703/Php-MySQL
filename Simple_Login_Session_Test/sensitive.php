<?php
session_start();

if( $_SESSION['logged_in'] != "Yes"){
    header("Location:index.php");
}
?>

<h1>Lorem ipsum dolor sit amet.</h1>
<?php
include "links.php";
?>