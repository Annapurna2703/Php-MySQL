<?php
session_start();

if( $_SESSION['logged_in'] != "Yes"){
    header("Location:index.php");
}
?>
<h1>Welcome to home page</h1>
    Hello User
<?php
include "links.php";
?>