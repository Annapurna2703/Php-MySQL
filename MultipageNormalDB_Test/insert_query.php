<?php
include "config.php";


$sql = "INSERT INTO `Products` (`Name`, `Price`) VALUES ('$_POST[Name]', '$_POST[Price]') ";
$db->query($sql);

header("Location: show.php?msg=".$_POST['Name']." inserted Successfully");
?>